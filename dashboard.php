<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
require 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/dashboard.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-primary">Dashboard</h1>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>

  <p>Hello, <strong><?php echo htmlspecialchars($_SESSION["user"]["email"]); ?></strong>!</p>

  <!-- Import Excel Modal Trigger -->
  <button type="button" class="btn btn-success mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#importModal">
    Import Excel File
  </button>
</div>

<!-- Import Excel Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="import_excel.php" method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="file" name="excel_file" accept=".xlsx, .xls, .csv" class="form-control" required>
        <small class="text-muted">Please upload the Union Overall report Excel file</small>
      </div>
      <div class="modal-footer">
        <button type="submit" name="excel_data_save" class="btn btn-success">Import</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>


<!-- Data Table -->
<div class="container">
  <table class="table table-bordered table-striped shadow-sm">
    <thead class="table-primary">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
   <tbody>
  <?php
  // Fetch only the latest record (LIMIT 1)
  require 'conn.php';
  $recordResult = $conn->query("SELECT id, title FROM weekly_record ORDER BY created_at DESC LIMIT 1");

  if ($recordResult && $row = $recordResult->fetch_assoc()):
  ?>
    <tr>
      <td><?= htmlspecialchars($row['title']) ?></td>
      <td>
        <a href="view_report.php?record_id=<?= $row['id'] ?>" class="btn btn-sm btn-info" target="_blank">View</a>
      </td>
    </tr>
  <?php else: ?>
    <tr>
      <td colspan="2" class="text-center">No record found</td>
    </tr>
  <?php endif; ?>
</tbody>

    </tbody>
  </table>
</div>


</body>
</html>