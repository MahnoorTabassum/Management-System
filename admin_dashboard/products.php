<?php
include '../config.php'; // Ensure config.php has correct DB variables

// Handle Create Product
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name'];

    // Ensure the 'images' directory exists
    $uploadDirectory = "images/";
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Move uploaded image to the 'images' directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory . $image)) {
        $sql = "INSERT INTO `products`(`name`, `description`, `price`, `image`, `quantity`) 
                VALUES ('$name', '$description', '$price', '$image', '$quantity')";
        mysqli_query($conn, $sql);
        header("Location: products.php"); // Redirect to prevent form resubmission
        exit();
    } else {
        echo "Failed to upload image.";
    }
}

// Handle Update Product
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', quantity='$quantity' WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: products.php");
    exit();
}

// Handle Delete Product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: products.php");
    exit();
}

// Query to fetch all product details
$sql = "SELECT id, name, description, price, image, quantity FROM products";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <title>Products Management</title>
    <style>
        body {
            font-family: 'DM Serif Text', serif;
            background-color: #f4f7f6;
        }
        .container {
    max-width: 1200px; /* Adjusted to fit larger tables */
    margin: 40px auto; /* Reduced margin for a cleaner look */
    padding: 20px; /* Reduced padding */
}

.table-container {
    max-width: 1200px; /* Consistent width with .container */
    margin: 20px auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.form-container{
    max-width: 600px; /* Consistent width with .container */
    margin: 20px auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-control {
            height: 45px;
            font-size: 16px;
            border-radius: 6px;
            background-color: #fafafa;
        }
        .btn-primary {
            width: 100%;
            padding: 9px;
            font-size: 18px;
            border-radius: 8px;
            background: #1e130c;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #9a8478, #1e130c);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #9a8478, #1e130c); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
border-color: #9a8478 ;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e130c;
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        form input, form button {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #52442b;  
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
        .action-buttons button, .action-buttons a {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .update-btn {
            background-color: #ffc107;
        }
        .update-btn:hover {
            background-color: #e0a800;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<h2>Products Management</h2>

<div class="form-container">
    <h3>Add New Product</h3>
    <form action="products.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <div class="form-group">
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Add Product</button>
    </form>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>Product ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($product = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($product['id']) ?></td>
                    <td>
                        <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="100">
                    </td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['description']) ?></td>
                    <td>Rs <?= htmlspecialchars($product['price']) ?></td>
                    <td><?= htmlspecialchars($product['quantity']) ?></td>
                    <td class="action-buttons">
                        <form action="products.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                            <input type="text" name="description" value="<?= htmlspecialchars($product['description']) ?>" required>
                            <input type="number" name="price" value="<?= $product['price'] ?>" required>
                            <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required>
                            <br>
                            <button type="submit" name="update" class="update-btn">Update</button>
                            <a href="products.php?delete=<?= $product['id'] ?>" onclick="return confirm('Are you sure you want to delete this product?');" class="delete-btn">Delete</a>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No product data found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<?php
// Close the database connection
mysqli_close($conn);
include 'includes/footer.php';
?>

</body>
</html>