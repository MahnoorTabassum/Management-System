<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    
    if (!$user) {
        $error = "Username not found."; // Debugging output
    } else {
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['admin_id'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Password does not match."; // Debugging output
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville+SC&family=DM+Serif+Text:ital@0;1&family=Nerko+One&display=swap" rel="stylesheet">
 
    <title>Login</title>
    <style>

body {
    font-family: "DM Serif Text", system-ui;
  font-weight: 400;
  font-style: normal;
    background-color: #f7f7f7; /* Soft gray */
}

.container {
    max-width: 400px;
    margin: 50px auto;
    margin-top:150px;
    padding: 30px;
    background-color: #c4b595;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #1e130c;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    height: 50px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc; /* Light gray */
    border-radius: 5px;
    background-color: #f9f9f9; /* Lighter gray */
}

.form-control:focus {
    border-color: #66d9ef; /* Soft blue */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    width: 100%;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    background: #1e130c;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #9a8478, #1e130c);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #9a8478, #1e130c); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    border-color: #1e130c;
    color: #fff;
}

.btn-primary:hover {
    background-color:#1e130c; /* Deeper blue */
    border-color: #1877f2;
}

::placeholder {
    color: #999; /* Light gray */
    font-size: 14px;
}

@media (max-width: 768px) {
    .container {
        margin: 20px auto;
    }
}
    </style>
</head>
<body>
<div class="container">
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <form method="POST">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>
