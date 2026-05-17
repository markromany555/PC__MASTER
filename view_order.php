<?php
include 'includes/db_connection.php';

if (!isset($_GET['id'])) {
    header("Location: orders.php");
    exit;
}

$order_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM orders WHERE id = '$order_id'";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    echo "Order not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details #<?php echo $order_id; ?></title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <h4 class="mb-0">Order Details #<?php echo $order_id; ?></h4>
                <a href="orders.php" class="btn btn-outline-light btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Customer Information</h5>
                        <p><strong>Name:</strong> <?php echo $order['customer_name']; ?></p>
                        <p><strong>Date:</strong> <?php echo $order['created_at']; ?></p>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5>Status</h5>
                        <span class="badge bg-warning text-dark fs-6"><?php echo $order['status']; ?></span>
                        <h3 class="mt-3 text-primary">Total: $<?php echo number_format($order['total_price'], 2); ?></h3>
                    </div>
                </div>
                <hr>
                <p class="text-muted">PC Configuration details would be listed here.</p>
            </div>
        </div>
    </div>
</body>
</html>