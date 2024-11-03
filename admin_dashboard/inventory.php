<?php
include('config.php');

// Fetch inventory items
$query = "SELECT * FROM inventory";
$result = mysqli_query($conn, $query);

// Add new item
if (isset($_POST['add'])) {
    $name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $restock_date = $_POST['restock_date'];
    $expiration_date = $_POST['expiration_date'];

    $add_query = "INSERT INTO inventory (product_name, quantity, unit_price, restock_date, expiration_date)
                  VALUES ('$name', $quantity, $unit_price, '$restock_date', '$expiration_date')";
    mysqli_query($conn, $add_query);
    header("Location: inventory.php");
}

// Update item
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    
    $update_query = "UPDATE inventory SET quantity=$quantity, unit_price=$unit_price WHERE id=$id";
    mysqli_query($conn, $update_query);
    header("Location: inventory.php");
}

// Delete item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_query = "DELETE FROM inventory WHERE id=$id";
    mysqli_query($conn, $delete_query);
    header("Location: inventory.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Inventory Management</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Restock Date</th>
                <th>Expiration Date</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['unit_price']; ?></td>
                    <td><?php echo $row['restock_date']; ?></td>
                    <td><?php echo $row['expiration_date']; ?></td>
                    <td>
                        <a href="inventory.php?delete=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <h3>Add New Item</h3>
        <form method="POST" action="inventory.php">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="number" name="unit_price" placeholder="Unit Price" step="0.01" required>
            <input type="date" name="restock_date">
            <input type="date" name="expiration_date">
            <button type="submit" name="add">Add Item</button>
        </form>
    </div>
</body>
