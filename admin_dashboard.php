<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include 'includes/db_connection.php';

$product_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM products");
$product_count = mysqli_fetch_assoc($product_count_query)['total'];

$category_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM categories");
$category_count = mysqli_fetch_assoc($category_count_query)['total'];

$order_count = 0;
$check_orders = mysqli_query($conn, "SHOW TABLES LIKE 'orders'");
if(mysqli_num_rows($check_orders) > 0) {
    $order_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders");
    $order_count = mysqli_fetch_assoc($order_count_query)['total'];
}

if (isset($_GET['delete_id'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_query = "DELETE FROM products WHERE id = $id_to_delete";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: admin_dashboard.php?msg=deleted");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | PC Master</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .sidebar { height: 100vh; background: #2c3e50; color: white; position: fixed; width: 250px; }
        .main-content { margin-left: 250px; padding: 30px; }
        .nav-link { color: rgba(255,255,255,0.7); transition: 0.3s; text-decoration: none; display: block; padding: 10px; }
        .nav-link:hover, .nav-link.active { color: white; background: rgba(255,255,255,0.1); border-radius: 5px; }
        .stat-card { border: none; border-radius: 15px; transition: 0.3s; }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4"><i class="fas fa-user-shield"></i> Admin PC</h4>
    <hr>
    <ul class="nav flex-column mb-auto">
        <li class="nav-item"><a href="admin_dashboard.php" class="nav-link active"><i class="fas fa-chart-line me-2"></i> Dashboard</a></li>
        <li><a href="orders.php" class="nav-link"><i class="fas fa-shopping-cart me-2"></i> Orders</a></li>
    </ul>
    <hr>
    <a href="logout.php" class="btn btn-danger btn-sm w-100">Logout</a>
</div>

<div class="main-content">
    <h2 class="mb-4">Welcome Back, Mark</h2>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card stat-card bg-primary text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h5>Total Products</h5> <h2><?php echo $product_count; ?></h2></div>
                    <i class="fas fa-microchip fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card bg-success text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h5>Categories</h5> <h2><?php echo $category_count; ?></h2></div>
                    <i class="fas fa-list fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card bg-warning text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h5>New Orders</h5> <h2><?php echo $order_count; ?></h2></div>
                    <i class="fas fa-shopping-bag fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5 shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title">Manage Products</h5>
                <a href="add_product.php" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i> Add New</a>
            </div>
            
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Socket</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_all = "SELECT p.*, c.name as cat_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC";
                    $result = mysqli_query($conn, $sql_all);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><span class='badge bg-info text-dark'><?php echo $row['cat_name'] ?? 'General'; ?></span></td>
                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                        <td><?php echo $row['socket_type']; ?></td>
                        <td><span class='text-success small'><i class='fas fa-check-circle'></i> Active</span></td>
                        <td class="text-center">
                            <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>