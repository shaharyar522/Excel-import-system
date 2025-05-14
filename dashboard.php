<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
 // Load imported Excel data
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
    <!-- now import_excel.php is backen code php -->
    <form action="import_excel.php" method="POST" enctype="multipart/form-data" class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <input type="file" name="excel_file"  class="form-control" required>
      </div>

      <!-- here is modal when click the button they open  -->
      <div class="modal-footer">
        <button type="submit" name="excel_data_save" class="btn btn-success">Import</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>

    </form>
  </div>
</div>


<!-- after insert data they fetch the data from database and shwo in this -->
<?php
require 'conn.php';

$data = [];
$result = $conn->query("SELECT * FROM students ORDER BY id ASC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>


<?php if (count($data) > 0): ?>
  <div class="container mt-5">
    <h2 class="mb-4 text-success">Imported Excel Data</h2>
    <table class="table table-bordered table-striped table-hover shadow-sm bg-white">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Course</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['fullname']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
          <td><?= htmlspecialchars($row['course']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

</body>
</html>
