<?php
session_start();
<<<<<<< HEAD
include('conn.php');
=======
include('connection.php');
>>>>>>> 50f5a6f (Initial commit from local project)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM log_in WHERE email = ?";
<<<<<<< HEAD
    $stmt = $conn->prepare($sql);
=======
    $stmt = $mysqli->prepare($sql);
>>>>>>> 50f5a6f (Initial commit from local project)
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $error = "";
    $success = false;

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user["password"]) {
            $_SESSION["user"] = $user;
            $success = true;
        } else {
            $error = "invalid_credentials";
        }
    } else {
        $error = "invalid_credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Excel Sheet  System</title>
<<<<<<< HEAD
  <link rel="stylesheet" href="css/login.css" />
=======
  <link rel="stylesheet" href="assets/css/login.css" />
>>>>>>> 50f5a6f (Initial commit from local project)
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="login-container">
  <div class="login-header">
    <h2>Login</h2>
  </div>
  
  <form class="login-form" method="post" autocomplete="off">
    <div class="form-group">
      <i class="fas fa-envelope input-icon"></i>
      <input type="email" name="email" class="form-input" placeholder=" " required>
      <span class="floating-label">Email Address</span>
    </div>
    
    <div class="form-group">
      <i class="fas fa-lock input-icon"></i>
      <input type="password" name="password" class="form-input" placeholder="" required>
      <span class="floating-label">Password</span>
    </div>
    
    <button type="submit" class="login-btn">Login</button>
  </form>
</div>

<!-- SweetAlert Responses (same as before) -->
<?php if (isset($error) && $error === "invalid_credentials"): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Login Failed',
    text: '❌ Incorrect email or password.',
    confirmButtonText: 'OK',
    background: '#ffffff',
    backdrop: 'rgba(0,0,0,0.4)'
  });
</script>
<?php endif; ?>

<?php if (isset($success) && $success === true): ?>
<script>
  Swal.fire({
    icon: 'success',
    text: 'Login successful. Redirecting to dashboard...',
    timer: 2000,
    showConfirmButton: false,
    allowOutsideClick: false,
    background: '#ffffff',
    didOpen: () => {
      Swal.showLoading();
    }
  }).then(() => {
<<<<<<< HEAD
    window.location.href = 'dashboard.php';
=======
    window.location.href = 'dashboad.php';
>>>>>>> 50f5a6f (Initial commit from local project)
  });
</script>
<?php endif; ?>

</body>
</html>
