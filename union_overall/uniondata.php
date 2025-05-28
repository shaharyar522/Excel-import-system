<?php
require '../connection.php';
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Union Overall</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .back-btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Union Overall Reports</h1>
           
        </div>

        

        <!-- Data Table -->
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th>Day(s)</th>
                        <th>Total Rows</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody id="weeklyRecordTbody">
                    <?php
                    $query = "SELECT * 
                        FROM weekly_record 
                        LEFT JOIN (
                            SELECT COUNT(id) AS total_rows, weekly_record_id 
                            FROM union_overall 
                            GROUP BY weekly_record_id
                        ) b ON b.weekly_record_id = weekly_record.id 
                        ORDER BY weekly_record.date_to DESC";

                    $recordResult = $mysqli->query($query);

                    if ($recordResult && $recordResult->num_rows > 0):
                        while ($row = $recordResult->fetch_assoc()):
                            $dateFrom = new DateTime($row['date_from']);
                            $dateTo = new DateTime($row['date_to']);
                            $interval = $dateFrom->diff($dateTo)->days + 1;
                    ?>
                            <tr>
                                <td><?= htmlspecialchars($row['title']) ?></td>
                                <td><?= date('m-d-Y', strtotime($row['date_from'])) ?></td>
                                <td><?= date('m-d-Y', strtotime($row['date_to'])) ?></td>
                                <td><?= $interval ?></td>
                                <td><?= $row['total_rows'] ?></td>
                                <td>
                                    <a href="view_union.php?record_id=<?= $row['id'] ?>" class="btn btn-sm btn-info">View</a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="<?= $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                    else:
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">No record found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var recordId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will permanently delete the record and its data.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'delete_union.php?record_id=' + recordId;
                    }
                });
            });
        });
    </script>

    <div class="d-flex justify-content-center my-3">
   <button id="backToDashboard" class="btn btn-secondary mb-3">← Back to Dashboard</button>
</div>
</body>
</html>