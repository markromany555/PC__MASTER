<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include 'includes/db_connection.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        die("Product not found!");
    }
}

if (isset($_POST['update_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $socket = mysqli_real_escape_string($conn, $_POST['socket_type']);
    $cat_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $update_sql = "UPDATE products SET 
                   name = '$name', 
                   price = '$price', 
                   socket_type = '$socket', 
                   category_id = '$cat_id' 
                   WHERE id = $id";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: admin_dashboard.php?msg=updated");
        exit;
    } else {
        echo "An error occurred during the update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product | PC Master</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Product</h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Socket / Type</label>
                            <input type="text" name="socket_type" class="form-control" value="<?php echo $product['socket_type']; ?>">
                            <small class="text-muted">Example: LGA 1700, AM4, DDR4...</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Category ID</label>
                            <input type="number" name="category_id" class="form-control" value="<?php echo $product['category_id']; ?>">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="update_product" class="btn btn-success">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                            <a href="admin_dashboard.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>