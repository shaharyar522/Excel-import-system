<?php
require 'connection.php';

// Fetch all distinct weekly_record_ids
$ids_result = $mysqli->query("SELECT DISTINCT weekly_record_id FROM union_overall ORDER BY weekly_record_id DESC");

$all_data = [];

while ($row = $ids_result->fetch_assoc()) {
    $weekly_record_id = $row['weekly_record_id'];

    // Fetch title
    $title_res = $mysqli->query("SELECT title FROM weekly_record WHERE id = $weekly_record_id");
    $title_row = $title_res && $title_res->num_rows > 0 ? $title_res->fetch_assoc() : ['title' => 'N/A'];
    $date_title = $title_row['title'];

    // Fetch union_overall records for this weekly_record_id
    $data_result = $mysqli->query("SELECT * FROM union_overall WHERE weekly_record_id = $weekly_record_id");

    // Get fields_list
    $fields_list = '';
    $fieldsListResult = $mysqli->query("SELECT fields_list FROM union_overall WHERE weekly_record_id = $weekly_record_id LIMIT 1");
    if ($fieldsListResult && $fieldsListResult->num_rows > 0) {
        $fields_list = $fieldsListResult->fetch_assoc()['fields_list'];
    } else {
        $fields = $data_result ? $data_result->fetch_fields() : [];
        $fields_list = implode(',', array_map(fn($f) => $f->name, $fields));
    }

    $fieldNames = array_filter(array_map('trim', explode(',', $fields_list)));

    // Organize columns
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

    // Calculate totals
    $sums = [];
    $startIndex = 2;
    if ($data_result && $data_result->num_rows > 0) {
        $data_result->data_seek(0);
        while ($row = $data_result->fetch_assoc()) {
            foreach ($columns_in_order as $index => $colData) {
                if ($index >= $startIndex) {
                    $val = $row[$colData['name']] ?? 0;
                    if (is_numeric($val)) {
                        $sums[$colData['name']] = ($sums[$colData['name']] ?? 0) + floatval($val);
                    }
                }
            }
        }
        $data_result->data_seek(0);
    }

    $all_data[] = [
        'id' => $weekly_record_id,
        'title' => $date_title,
        'columns_in_order' => $columns_in_order,
        'result' => $data_result,
        'sums' => $sums,
        'startIndex' => $startIndex,
    ];
}

function humanize($text)
{
    return ucwords(str_replace(['Player_Winnings', 'Club_Earnings', '_'], ['', '', ' '], $text));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Union Overall Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
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

        .date-cell {
            background-color: #e2e3e5;
            font-weight: bold;
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

        /* Sticky for both rows of thead */
        .table-scroll-container thead tr:nth-child(1) th {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 3;
        }

        .table-scroll-container thead tr:nth-child(2) th {
            position: sticky;
            /* top: 20px;  */
            background-color: white;
            /* z-index: 2; */
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <div class="row mb-3">
            
                <form action="" method="GET" class="row g-3 mb-4">
                    <div class="col-md-3">
                        <label for="date_from" class="form-label">Date From</label>
                        <input type="date" class="form-control" id="date_from" name="date_from" required>
                    </div>
                    <div class="col-md-3">
                        <label for="date_to" class="form-label">Date To</label>
                        <input type="date" class="form-control" id="date_to" name="date_to" required>
                    </div>
                    <div class="col-md-3 align-self-end">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

            
        </div>

    </div>

    <?php foreach ($all_data as $tableData): ?>
        <div class="container-fluid mt-4 table-wrapper">
            <h5>Date: <?= htmlspecialchars($tableData['title']) ?></h5>
            <div class="table-scroll-container">
                <table class="table table-bordered table-sm align-middle">
                    <thead>
                        <tr>
                            <th rowspan="2" class="date-cell">Date</th>
                            <?php
                            $currentGroup = null;
                            $colspan = 0;
                            $columns = $tableData['columns_in_order'];
                            foreach ($columns as $index => $colData) {
                                $group = $colData['group'];
                                $nextGroup = $columns[$index + 1]['group'] ?? null;

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
                                        default:
                                            $color = 'yellow-header';
                                    }
                                    echo '<th colspan="' . $colspan . '" class="' . $color . '">' . $group . '</th>';
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <?php foreach ($columns as $colData):
                                if ($colData['group'] !== null) {
                                    switch ($colData['group']) {
                                        case 'Player Winnings':
                                            $color = 'red-header';
                                            break;
                                        case 'Club Winnings':
                                            $color = 'blue-header';
                                            break;
                                        default:
                                            $color = 'yellow-header';
                                    }
                                    echo '<th class="player-group ' . $color . '">' . humanize($colData['name']) . '</th>';
                                }
                            endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($tableData['result'] && $tableData['result']->num_rows > 0): ?>
                            <?php
                            $firstRow = true;
                            $rowCount = $tableData['result']->num_rows;
                            while ($row = $tableData['result']->fetch_assoc()):
                            ?>
                                <tr>
                                    <?php if ($firstRow): ?>
                                        <td style="word-wrap: break-word; white-space: normal;" rowspan="<?= $rowCount ?>" class="date-cell"><?= htmlspecialchars($tableData['title']) ?></td>
                                        <?php $firstRow = false; ?>
                                    <?php endif; ?>
                                    <?php foreach ($columns as $colData): ?>
                                        <td><?= htmlspecialchars($row[$colData['name']] ?? '0') ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= 1 + count($columns) ?>" class="text-center">No data found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="date-cell">Total</td>
                            <?php foreach ($columns as $index => $colData):
                                if ($index < $tableData['startIndex']) {
                                    echo '<td></td>';
                                    continue;
                                }
                                $sumVal = $tableData['sums'][$colData['name']] ?? 0;
                                echo '<td>' . ($sumVal != 0 ? number_format($sumVal, 2) : '') . '</td>';
                            endforeach; ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php endforeach; ?>





    <script>
        const tableScrollContainer = document.querySelector('.table-scroll-container');
        const secondRowHeaders = tableScrollContainer.querySelectorAll('thead tr:nth-child(2) th');

        tableScrollContainer.addEventListener('scroll', () => {
            console.log(secondRowHeaders)
            const scrollTop = tableScrollContainer.scrollTop;

            secondRowHeaders.forEach(th => {
                // If scrolling down, remove top spacing
                th.style.top = scrollTop > 0 ? '25px' : '0px';
            });
        });
    </script>

</body>

</html>