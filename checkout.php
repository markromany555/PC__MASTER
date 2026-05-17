<?php
include 'includes/db_connection.php';

$total = isset($_GET['total']) ? mysqli_real_escape_string($conn, $_GET['total']) : 0;
$customer = "Guest User";
$status = "Pending";

if ($total > 0) {
    $sql = "INSERT INTO orders (customer_name, total_price, status) VALUES ('$customer', '$total', '$status')";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Placed | PC Master</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
    <style>
        body { background-color: #0b0c10; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .order-card { background: #1f2833; border: 2px solid #66fcf1; border-radius: 20px; max-width: 500px; width: 100%; }
        .text-info-custom { color: #66fcf1; }
    </style>
</head>
<body>

<div class="container text-center">
    <div class="card order-card p-5 shadow-lg">
        <i class="fas fa-check-circle fa-5x text-info-custom mb-4"></i>
        <h1 class="text-white mb-3">Order Placed!</h1>
        <p class="text-light opacity-75">Your custom PC build has been successfully saved to our system.</p>
        
        <div class="bg-dark rounded p-3 mb-4">
            <h5 class="text-white m-0">Total Amount: <span class="text-info-custom">$<?php echo number_format($total, 2); ?></span></h5>
        </div>

        <hr class="border-secondary">
        
        <div class="d-grid gap-2">
            <button class="btn btn-info fw-bold" onclick="window.print()">
                <i class="fas fa-print me-2"></i> Print Invoice
            </button>
            <a href="index.php" class="btn btn-outline-light mt-2">Back to Home</a>
        </div>
    </div>
</div>

</body>
</html>