<?php
require '../connection.php';

$weekly_record_id = isset($_GET['record_id']) ? intval($_GET['record_id']) : 0;

// Query setup
if ($weekly_record_id > 0) {
    $query = "SELECT * FROM club_overall WHERE weekly_record_id = $weekly_record_id";
    $date_query = "SELECT title, date_from, date_to, club_overall_fields_list FROM weekly_record WHERE id = $weekly_record_id";
} else {
    $query = "SELECT * FROM club_overall";
    $date_query = "SELECT GROUP_CONCAT(title SEPARATOR ', ') as title FROM weekly_record";
}

// Execute queries
$result = $mysqli->query($query);
$date_result = $mysqli->query($date_query);

// Default values
$date_title = 'N/A';
$date_from = 'N/A';
$date_to = 'N/A';
$total_days = 'N/A';
$fields_list = '';

// Extract record data
if ($date_result && $date_result->num_rows > 0) {
    $row = $date_result->fetch_assoc();
    $date_title = $row['title'] ?? 'N/A';

    if ($weekly_record_id > 0) {
        $date_from = $row['date_from'] ?? 'N/A';
        $date_to = $row['date_to'] ?? 'N/A';
        $fields_list = $row['club_overall_fields_list'] ?? '';

        // Calculate total days
        if ($date_from !== 'N/A' && $date_to !== 'N/A') {
            $from = new DateTime($date_from);
            $to = new DateTime($date_to);
            $interval = $from->diff($to);
            $total_days = $interval->days + 1;
        }
    }
}

// Get column headers from club_overall if not stored
if (empty($fields_list)) {
    $fields = $result ? $result->fetch_fields() : [];
    $fields_list = implode(',', array_map(fn($f) => $f->name, $fields));
}

// Extract and group columns
$fieldNames = array_filter(array_map('trim', explode(',', $fields_list)));

$columns_in_order = [];
foreach ($fieldNames as $col) {
    if (in_array($col, ['id', 'weekly_record_id', 'fields_list'])) continue;

    if (str_starts_with($col, 'Player_Winnings')) {
        $columns_in_order[] = ['group' => 'Player Winnings', 'name' => $col];
    } elseif (str_starts_with($col, 'Club_Earnings')) {
        $columns_in_order[] = ['group' => 'Club Winnings', 'name' => $col];
    } else {
        $columns_in_order[] = ['group' => null, 'name' => $col];
    }
}

// Helper: format column names
function humanize($text) {
    return ucwords(str_replace(['Player_Winnings', 'Club_Earnings', '_'], ['', '', ' '], $text));
}

// Calculate column sums
$startIndex = 2;
$sums = [];
if ($result && $result->num_rows > 0) {
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
        foreach ($columns_in_order as $index => $colData) {
            if ($index >= $startIndex) {
                $val = $row[$colData['name']] ?? 0;
                if (is_numeric($val)) {
                    $sums[$colData['name']] = ($sums[$colData['name']] ?? 0) + floatval($val);
                }
            }
        }
    }
    $result->data_seek(0);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Club Overall Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .red-header {
            background-color: #FF6666 !important;
            color: white;
        }
        .blue-header {
            background-color: #3498db !important;
            color: white;
        }
        .green-header {
            background-color: #27B665 !important;
            color: white;
        }
        .yellow-header {
            background-color: #27B665 !important;
            color: black;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        .player-group {
            font-size: 13px;
        }
        .table-scroll-container {
            max-height: 800px;
            overflow-y: auto;
            overflow-x: auto;
        }
        .table-scroll-container thead tr:nth-child(1) th {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 3;
        }
        .table-scroll-container thead tr:nth-child(2) th {
            position: sticky;
            background-color: white;
        }
        .header-box {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            border-radius: 12px;
            margin-top: 20px;
        }
        .header-box .head-title {
            margin: 0px !important;
        }
        .header-box:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-md-3">
                <a href="clubdata.php" class="btn btn-primary">Back to Club Reports</a>
            </div>
        </div>
        <div class="row g-3 m-0 p-3 rounded bg-white header-box">
            <div class="col-md-3 head-title text-center">
                <h4>Title</h4>
                <h6 style="word-wrap: break-word; white-space: normal;"><?= htmlspecialchars($date_title) ?></h6>
            </div>
            <div class="col-md-3 head-title text-center">
                <h4>Start Date</h4>
                <h6><?= htmlspecialchars($date_from) ?></h6>
            </div>
            <div class="col-md-3 head-title text-center">
                <h4>End Date</h4>
                <h6><?= htmlspecialchars($date_to) ?></h6>
            </div>
            <div class="col-md-3 head-title text-center">
                <h4>Total Days</h4>
                <h6><?= htmlspecialchars($total_days) ?></h6>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2 table-wrapper">
        <div class="table-scroll-container">
            <table id="myTable" class="table table-bordered table-sm align-middle">
                <thead>
                    <tr>
                        <th rowspan="2" class="green-header">#</th>
                        <?php
                        $currentGroup = null;
                        $colspan = 0;
                        foreach ($columns_in_order as $index => $colData) {
                            $group = $colData['group'];
                            $nextGroup = $columns_in_order[$index + 1]['group'] ?? null;

                            if ($group === null) {
                                echo '<th style="background-color:#068706" rowspan="2" class="' .
                                    (in_array($colData['name'], ['Club_Name', 'Club_ID']) ? 'green-header' : 'red-header') .
                                    '">' . humanize($colData['name']) . '</th>';
                                continue;
                            }

                            if ($group !== $currentGroup) {
                                $colspan = 1;
                                $currentGroup = $group;
                            } else {
                                $colspan++;
                            }

                            $nextIsDifferent = $nextGroup !== $currentGroup;
                            if ($nextIsDifferent) {
                                switch ($group) {
                                    case 'Player Winnings':
                                        $color = 'red-header';
                                        break;
                                    case 'Club Winnings':
                                        $color = 'blue-header';
                                        break;
                                    case 'Other Group':
                                        $color = 'green-header';
                                        break;
                                    default:
                                        $color = 'yellow-header';
                                }
                                echo '<th colspan="' . $colspan . '" class="' . $color . '">' . $group . '</th>';
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        foreach ($columns_in_order as $colData) {
                            if ($colData['group'] !== null) {
                                switch ($colData['group']) {
                                    case 'Player Winnings':
                                        $color = 'red-header';
                                        break;
                                    case 'Club Winnings':
                                        $color = 'blue-header';
                                        break;
                                    case 'Other Group':
                                        $color = 'green-header';
                                        break;
                                    default:
                                        $color = 'yellow-header';
                                }
                                echo '<th class="player-group ' . $color . '">' . humanize($colData['name']) . '</th>';
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php $serial = 0;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= ++$serial ?></td>
                                <?php foreach ($columns_in_order as $colData): ?>
                                    <td><?= htmlspecialchars($row[$colData['name']] ?? '0') ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= 1 + count($columns_in_order) ?>" class="text-center">No data found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td class="date-cell">#</td>
                        <?php
                        foreach ($columns_in_order as $index => $colData) {
                            if ($index < $startIndex) {
                                echo '<td></td>';
                                continue;
                            }
                            $sumVal = $sums[$colData['name']] ?? 0;
                            echo '<td>' . ($sumVal != 0 ? number_format($sumVal, 2) : '') . '</td>';
                        }
                        ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable th').each(function(index) {
                if (index === 1) {
                    $(this).css('cursor', 'pointer').click(function() {
                        let asc = $(this).data('asc') ?? true;
                        let rows = $('#myTable tbody tr').get();
                        rows.sort(function(a, b) {
                            let A = parseFloat($(a).children('td').eq(index).text()) || 0;
                            let B = parseFloat($(b).children('td').eq(index).text()) || 0;
                            return asc ? A - B : B - A;
                        });
                        $.each(rows, function(i, row) {
                            $('#myTable tbody').append(row);
                        });
                        $(this).data('asc', !asc);
                    });
                }
            });
        });
    </script>

    <script>
        const tableScrollContainer = document.querySelector('.table-scroll-container');
        const secondRowHeaders = tableScrollContainer.querySelectorAll('thead tr:nth-child(2) th');

        tableScrollContainer.addEventListener('scroll', () => {
            const scrollTop = tableScrollContainer.scrollTop;
            secondRowHeaders.forEach(th => {
                th.style.top = scrollTop > 0 ? '25px' : '0px';
            });
        });
    </script>
</body>
</html>