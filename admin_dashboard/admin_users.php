<?php
// Include the config file to connect to the database
include 'config.php';

// Query to count the number of admin users
$sql = "SELECT COUNT(*) AS total_admins FROM admin_users";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_admins = $row['total_admins'];
} else {
    $total_admins = "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Admin Users</title>
    <style>
        /* Center content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }
        
        /* Card styling */
        .card {
            background-color: #52442b;  
            color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        /* Title styling */
        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Number styling */
        .card .number {
            font-size: 36px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Total Admin Users</h2>
        <div class="number">
            <?php echo $total_admins; ?>
        </div>
    </div>
</body>
</html>
