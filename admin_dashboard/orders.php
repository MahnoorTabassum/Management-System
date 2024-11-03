<?php
// Include the config file to connect to the database
include 'config.php';

// Query to retrieve all orders
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
    
        // Table structure
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Total Amount</th>
                <th>Created At</th>
                <th>Status</th>
              </tr>";

        // Fetch and display each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['postal_code']}</td>
                    <td>\${$row['total_amount']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <select class='status-dropdown'>
                            <option value='Pending'>Pending</option>
                            <option value='Approved'>Approved</option>
                            <option value='Confirmed'>Confirmed</option>
                        </select>
                    </td>
                  </tr>";
        }

        echo "</table>"; // End of the HTML table
    } else {
        echo "<p class='no-orders'>No orders found.</p>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        table {
            width: 90%;
            max-width: 1000px;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #52442b;  
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td {
            color: #333;
        }
        .no-orders {
            color: #666;
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
        }
        /* Dropdown Styling */
        .status-dropdown {
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: none;
            background: linear-gradient(135deg, #6d5c2f, #8b7b49);
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .status-dropdown:hover {
            background: linear-gradient(135deg, #8b7b49, #6d5c2f);
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.3);
        }

        .status-dropdown option {
            color: #333;
            padding: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <!-- Your content goes here -->
</body>
</html>
