<?php
require 'connection.php';
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
.dashboard-btn {
    padding: 10px 20px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    color: white;
    font-weight: 600;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.dashboard-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, 
        rgba(106, 17, 203, 0.8) 0%, 
        rgba(37, 117, 252, 0.8) 100%);
    z-index: -1;
    border-radius: inherit;
}

.dashboard-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    background: rgba(255, 255, 255, 0.3);
}

.dashboard-btn:active {
    transform: translateY(1px);
}
</style>

</head>

<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Dashboard</h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>



    <!-- Button Row -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="#" class="dashboard-btn load-section" data-url="union_overall/uniondata.php">Union Overall</a>
        <a href="#" class="dashboard-btn load-section" data-url="club_overall/clubdata.php">Club Overall</a>
        <a href="#" class="dashboard-btn">Club Detailed</a>
        <a href="#" class="dashboard-btn">Games</a>
        <a href="#" class="dashboard-btn">Trade Record</a>
        <a href="#" class="dashboard-btn">Statement</a>
        <a href="#" class="dashboard-btn">Leaderboard</a>
        <a href="#" class="dashboard-btn">User Details</a>
        <a href="#" class="dashboard-btn">Fee Return</a>
    </div>

    <!-- Import Excel Modal Trigger -->
    <button type="button" class="btn btn-success mt-3 mb-4" data-bs-toggle="modal" name="save_excel_data" data-bs-target="#importModal">
        Import Excel File
    </button>
    <a style="display:none;" href="serach_excel.php" class="btn btn-success mt-3 mb-4">Search Excel File</a>
</div>





    <!-- Import Excel Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="importExcelForm" enctype="multipart/form-data" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_from" class="form-label">Date From</label>
                            <input type="date" name="date_from" id="date_from" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="date_to" class="form-label">Date To</label>
                            <input type="date" name="date_to" id="date_to" class="form-control">
                        </div>
                    </div>

                    <input type="file" name="file_input" accept=".xlsx, .xls, .csv" class="form-control" required>
                    <small class="text-muted">Please upload the Union Overall report Excel file</small>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="save_excel_data" value="yes" class="btn btn-success">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">Import</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    
   <!-- Data Table -->


    <div id="mainDashboardTable">
    <div class="container">
        <table class="table table-bordered table-striped shadow-sm">
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
                // Fetch all weekly_record rows ordered by creation date
                $query = "SELECT * 
                    FROM weekly_record 
                    LEFT JOIN (
                        SELECT COUNT(id) AS total_rows, weekly_record_id 
                        FROM union_overall 
                        GROUP BY weekly_record_id
                    ) b ON b.weekly_record_id = weekly_record.id 
                    ORDER BY weekly_record.date_to DESC;
                    ";


                $recordResult = $mysqli->query($query);



                if ($recordResult && $recordResult->num_rows > 0):
                    while ($row = $recordResult->fetch_assoc()):
                        $dateFrom = new DateTime($row['date_from']);
                        $dateTo = new DateTime($row['date_to']);
                        $interval = $dateFrom->diff($dateTo)->days + 1; // include both start and end dates
                ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= date('m-d-Y', strtotime($row['date_from'])) ?></td>
                            <td><?= date('m-d-Y', strtotime($row['date_to'])) ?></td>
                            <td><?= $interval ?></td>
                            <td><?= $row['total_rows'] ?></td>
                            <td>
                                <a href="view_details.php?record_id=<?= $row['id'] ?>" class="btn btn-sm btn-info" target="_blank">View</a>
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
 
<!-- old table -->
    <!-- <div class="container">
        <table class="table table-bordered table-striped shadow-sm">
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
                // Fetch all weekly_record rows ordered by creation date
                $query = "SELECT * 
                    FROM weekly_record 
                    LEFT JOIN (
                        SELECT COUNT(id) AS total_rows, weekly_record_id 
                        FROM union_overall 
                        GROUP BY weekly_record_id
                    ) b ON b.weekly_record_id = weekly_record.id 
                    ORDER BY weekly_record.date_to DESC;
                    ";


                $recordResult = $mysqli->query($query);



                if ($recordResult && $recordResult->num_rows > 0):
                    while ($row = $recordResult->fetch_assoc()):
                        $dateFrom = new DateTime($row['date_from']);
                        $dateTo = new DateTime($row['date_to']);
                        $interval = $dateFrom->diff($dateTo)->days + 1; // include both start and end dates
                ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= date('m-d-Y', strtotime($row['date_from'])) ?></td>
                            <td><?= date('m-d-Y', strtotime($row['date_to'])) ?></td>
                            <td><?= $interval ?></td>
                            <td><?= $row['total_rows'] ?></td>
                            <td>
                                <a href="view_details.php?record_id=<?= $row['id'] ?>" class="btn btn-sm btn-info" target="_blank">View</a>
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
    </div> -->
    <!-- Placeholder for dynamic content -->
<div id="dynamicContentContainer" style="display:none;"></div>



<!-- add jquery -->
 <script>
$(document).ready(function () {
    $('.load-section').click(function (e) {
        e.preventDefault();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                // Hide the main table
                $('#mainDashboardTable').hide();

                // Show the dynamic container and insert content
                $('#dynamicContentContainer').html(response).show();
            },
            error: function () {
                alert('Failed to load content.');
            }
        });
    });

    // Optional: back to dashboard button logic (insert this in your loaded content)
    $(document).on('click', '#backToDashboard', function () {
        $('#dynamicContentContainer').hide().empty();
        $('#mainDashboardTable').show();
    });
});
</script>

</body>
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
                    window.location.href = 'delete_details.php?record_id=' + recordId;
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#importExcelForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            // Add this so PHP receives $_POST['save_excel_data']
            formData.append('save_excel_data', 'yes');

            $.ajax({
                url: 'code.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    let btn = $('#importExcelForm button[name="save_excel_data"]');
                    btn.prop('disabled', true);
                    btn.find('.spinner-border').removeClass('d-none');
                    btn.find('.btn-text').text('Importing...');
                },
                success: function(response) {
                    let res = (typeof response === "string") ? JSON.parse(response) : response;

                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message || 'File imported successfully!'
                        });

                        $('#importModal').modal('hide');
                        $('#importExcelForm')[0].reset();

                        // Format date mm-dd-yyyy
                        const formatDate = (dateStr) => {
                            const d = new Date(dateStr);
                            const day = String(d.getDate()).padStart(2, '0');
                            const month = String(d.getMonth() + 1).padStart(2, '0');
                            const year = d.getFullYear();
                            return `${month}-${day}-${year}`;
                        };

                        // Calculate days between dates including both start and end day
                        const dateFrom = new Date(res.date_from);
                        const dateTo = new Date(res.date_to);
                        const timeDiff = dateTo.getTime() - dateFrom.getTime();
                        const dayCount = Math.floor(timeDiff / (1000 * 3600 * 24)) + 1; // +1 to include both ends

                        const newRow = `
            <tr>
                <td>${$('<div>').text(res.title).html()}</td>
                <td>${formatDate(res.date_from)}</td>
                <td>${formatDate(res.date_to)}</td>
                <td>${dayCount}</td>
                <td>${res.union_count}</td>
                <td>
                    <a href="view_details.php?record_id=${res.weekly_record_id}" class="btn btn-sm btn-info" target="_blank">View</a> 
                    <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="${res.weekly_record_id}">Delete</a>
                </td>
            </tr>
        `;

                        const tbody = $('#weeklyRecordTbody');
                        // Remove "No record found" row if present
                        if (tbody.find('tr').length === 1 && tbody.find('td[colspan="6"]').length) {
                            tbody.empty();
                        }

                        tbody.prepend(newRow);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message || 'Something went wrong!'
                        });
                    }

                    let btn = $('#importExcelForm button[name="save_excel_data"]');
                    btn.prop('disabled', false);
                    btn.find('.spinner-border').addClass('d-none');
                    btn.find('.btn-text').text('Import');
                },


                error: function(xhr, status, error) {
                    console.error("AJAX Error:", {
                        status: status,
                        error: error,
                        xhr: xhr,
                        responseText: xhr.responseText
                    });

                    let message = "An unexpected error occurred.";
                    try {
                        const json = JSON.parse(xhr.responseText);
                        message = json.message || message;
                    } catch (e) {
                        console.warn("Response is not JSON:", e);
                        message = xhr.responseText || message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: message
                    });

                    let btn = $('#importExcelForm button[name="save_excel_data"]');
                    btn.prop('disabled', false);
                    btn.find('.spinner-border').addClass('d-none');
                    btn.find('.btn-text').text('Import');
                }
            });

        });
    });
</script>


</html>