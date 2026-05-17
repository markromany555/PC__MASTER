<?php
include 'includes/db_connection.php';

$cat_id = isset($_GET['cat_id']) ? (int)$_GET['cat_id'] : 0;
$socket = isset($_GET['socket']) ? mysqli_real_escape_string($conn, $_GET['socket']) : '';

$query = "SELECT * FROM products WHERE category_id = $cat_id";

if ($cat_id == 2 && !empty($socket)) {
    $query .= " AND socket_type = '$socket'";
}

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo '<div class="list-group">';
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = htmlspecialchars(addslashes($row['name']));
        $price = $row['price'];
        $skt = isset($row['socket_type']) ? $row['socket_type'] : ''; 
        
        echo "
        <div class='list-group-item bg-dark text-white border-secondary d-flex justify-content-between align-items-center mb-2' style='border-radius: 8px;'>
            <div>
                <h6 class='mb-0 text-info'>{$row['name']}</h6>
                <small class='text-muted'>$skt | <span class='text-success'>\${$price}</span></small>
            </div>
            <button class='btn btn-sm btn-info text-white fw-bold' 
                    onclick=\"selectItem($id, '$name', $price, '$skt', $cat_id)\">
                Select
            </button>
        </div>";
    }
    echo '</div>';
} else {
    echo '<div class="text-center p-4">
            <i class="fas fa-exclamation-circle fa-2x text-warning mb-2"></i>
            <p class="text-white">No items found for this category.</p>
            <small class="text-muted">Make sure category_id in DB is ' . $cat_id . '</small>
          </div>';
}
?>