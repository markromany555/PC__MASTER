<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include 'includes/db_connection.php';

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header("Location: admin_products.php");
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat = $_POST['category_id'];
    $socket = $_POST['socket'];

    mysqli_query($conn, "INSERT INTO products (name, price, category_id, socket_type) VALUES ('$name', '$price', '$cat', '$socket')");
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
<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Product Management</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New Product</button>
    </div>

    <table class="table bg-white shadow-sm rounded">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $all = mysqli_query($conn, "SELECT * FROM products");
            while($p = mysqli_fetch_assoc($all)) {
                echo "<tr>
                        <td>#{$p['id']}</td>
                        <td>{$p['name']}</td>
                        <td>\${$p['price']}</td>
                        <td>
                            <a href='?delete={$p['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST">
      <div class="modal-header"><h5>Add New Component</h5></div>
      <div class="modal-body">
        <input type="text" name="name" class="form-control mb-3" placeholder="Product Name" required>
        <input type="number" step="0.01" name="price" class="form-control mb-3" placeholder="Price" required>
        <select name="category_id" class="form-control mb-3">
            <option value="1">CPU</option>
            <option value="2">Motherboard</option>
            <option value="3">GPU</option>
            <option value="4">RAM</option>
            <option value="5">Storage</option>
            <option value="6">PSU</option>
            <option value="7">PC Case</option>
        </select>
        <input type="text" name="socket" class="form-control mb-3" placeholder="Socket Type (e.g. AM4)">
      </div>
      <div class="modal-footer">
        <button name="add" class="btn btn-success w-100">Save Product</button>
      </div>
    </form>
  </div>
</div>