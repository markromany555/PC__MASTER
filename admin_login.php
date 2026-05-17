<?php
session_start();
include 'includes/db_connection.php';

if(isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_dashboard.php");
    exit;
}

$error = "";

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    if($username == "Mark" && $password == "01550231555") {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        header("Location: admin_dashboard.php");
    } else {
        $error = "Invalid Username or Password!";
    }
}


if (isset($_GET['delete_id'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_GET['delete_id']);
    
    $sql = "DELETE FROM products WHERE id = $id_to_delete";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | PC Master</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #1a1a2e; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { background: #16213e; border: 1px solid #4361ee; border-radius: 20px; width: 100%; max-width: 400px; padding: 40px; color: white; }
        .form-control { background: #0f3460; border: none; color: white; }
        .form-control:focus { background: #16213e; color: white; border: 1px solid #4361ee; box-shadow: none; }
        .btn-primary { background: #4361ee; border: none; padding: 12px; }
    </style>
</head>
<body>

<div class="login-card shadow-lg text-center">
    <h2 class="mb-4"><i class="fas fa-lock text-primary"></i> Admin Login</h2>
    
    <?php if($error): ?>
        <div class="alert alert-danger py-2"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3 text-start">
            <label class="form-label small">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
        </div>
        <div class="mb-4 text-start">
            <label class="form-label small">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100 fw-bold">SIGN IN</button>
    </form>
    <div class="mt-3">
        <a href="index.php" class="text-light text-decoration-none small">Back to Home</a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="./font-awesome-web/js/all.min.js"></script>
</body>
</html>