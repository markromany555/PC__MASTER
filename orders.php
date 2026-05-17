<?php
include 'includes/db_connection.php';

if (isset($_GET['delete_id'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_sql = "DELETE FROM orders WHERE id = '$id_to_delete'";
    
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: orders.php?msg=deleted");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders | Admin PC</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .order-card { border-radius: 15px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-shopping-basket text-primary"></i> Customer Orders</h2>
        <a href="admin_dashboard.php" class="btn btn-outline-secondary btn-sm">Back to Dashboard</a>
    </div>

    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Order has been deleted successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card order-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">No.</th> <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM orders ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql);

                        $display_number = mysqli_num_rows($result); 

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $status_class = ($row['status'] == 'Completed') ? 'bg-success' : 'bg-warning text-dark';
                                ?>
                                <tr>
                                    <td class='ps-4 fw-bold text-primary'>#<?php echo $display_number--; ?></td>
                                    <td><i class='fas fa-user-circle me-2'></i> <?php echo $row['customer_name']; ?></td>
                                    <td class='fw-bold'>$<?php echo number_format($row['total_price'], 2); ?></td>
                                    <td><span class='badge <?php echo $status_class; ?>'><?php echo $row['status']; ?></span></td>
                                    <td><?php echo date('Y-m-d H:i', strtotime($row['created_at'])); ?></td>
                                    <td class='text-center'>
                                        <a href="view_order.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info text-white me-1">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="orders.php?delete_id=<?php echo $row['id']; ?>" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure you want to delete this order?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4 text-muted'>No orders found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>