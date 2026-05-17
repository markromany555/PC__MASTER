<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include 'includes/db_connection.php';

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $socket = mysqli_real_escape_string($conn, $_POST['socket_type']);
    $cat_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $sql = "INSERT INTO products (name, price, socket_type, category_id) 
            VALUES ('$name', '$price', '$socket', '$cat_id')";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php?msg=added");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product | PC Master</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .card { border-radius: 15px; border: none; }
    </style>
</head>
<body class="p-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Add New Hardware</h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Intel Core i7-13700K" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Socket / Connection Type</label>
                            <input type="text" name="socket_type" class="form-control" placeholder="e.g. LGA 1700 or AM5">
                            <small class="text-light">Example: LGA 1700, AM4, DDR4...</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Category (ID)</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Category...</option>
                                <?php
                                $cats = mysqli_query($conn, "SELECT * FROM categories");
                                while($c = mysqli_fetch_assoc($cats)) {
                                    echo "<option value='{$c['id']}'>{$c['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="add_product" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-1"></i> Add Product
                            </button>
                            <a href="admin_dashboard.php" class="btn btn-light text-secondary">Cancel & Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>