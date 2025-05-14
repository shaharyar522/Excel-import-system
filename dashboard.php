<?php
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
  <link rel="stylesheet" href="css/dashboard.css" />
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container mt-5">
  <h1 class="mb-4">Welcome to Dashboard</h1>
  <p>Hello, <?php echo htmlspecialchars($_SESSION["user"]["email"]); ?>!</p>
  <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

  <!-- Button to Open Modal -->
  <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#imageModal">
    Choose Image
  </button>

  <!-- Modal -->
  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="upload_image.php" method="POST" enctype="multipart/form-data" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Upload Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="file" name="image" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="submit" name="upload" class="btn btn-success">Upload</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
