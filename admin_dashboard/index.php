<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
include 'includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1.0">
    <title>MT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville+SC&family=DM+Serif+Text:ital@0;1&family=Nerko+One&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" 
          href="style.css">
</head>

<body>
  
    <!-- for header part -->
    <header>

        <div class="logosec">
        <div class="logo">
            <a href="index.html">
                <img src="images/logo (2).png" alt="Website Logo">
            </a>
        </div>
            <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" 
                id="menuicn" 
                alt="menu-icon">
        </div>

        <div class="searchbar">
            <input type="text" 
                   placeholder="Search">
            <div class="searchbtn">
              <img src=
"search.png"
                    class="icn srchicn" 
                    alt="search-icon">
              </div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <img src=
"notification.png" 
                 class="icn" 
                 alt="">
            <div class="dp">
              <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" 
                    alt="dp">
              </div>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <img src=
"dashboard.png"
                            class="nav-img" 
                            alt="dashboard">
                      <h4> <a href="dashboard.php">Dashboard</a></h4>
                    </div>

                    <div class="option2 nav-option">
                        <!-- <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles"> -->
                            <h4><a href="admin_users.php">Manage Admin Users</a></h4>
                    </div>
                    
                    <div class="option2 nav-option">
                        <!-- <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles"> -->
                            <h4><a href="inventory.php">Inventory</a></h4>
                    </div>
                    
                  
                    <div class="nav-option option3">
                        <!-- <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> -->
                       <h4>  <a href="products.php"> Products</a></h4>
                    </div>


                    <div class="nav-option option4">
                        <!-- <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" 
                            alt="institution"> -->
                     <h4>  <a href="orders.php">Orders</a></h4>
                    </div>

                    <div class="nav-option logout">
                        <!-- <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img" 
                            alt="logout"> -->
                        <h4> <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a></h4>
                    </div>

                    <div class="nav-option option6">
                        <!-- <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" 
                            alt="settings"> -->
                        <h4> Settings</h4>
                    </div>

                   

                </div>
            </nav>
        </div>
        <div class="main">

            <div class="searchbar2">
                <input type="text" 
                       name="" 
                       id="" 
                       placeholder="Search">
                <div class="searchbtn">
                  </div>
            </div>

            <div class="box-container">

                <div class="box box1">
                    <div class="text">
                        <h2 class="topic-heading">150k</h2>
                        <h2 class="topic">Total Likes</h2>
                    
                    </div>
                </div>

                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading">53%</h2>
                        <h2 class="topic"> Total Orders</h2>
                    </div>
                </div>

  
                <div class="box box4">
                    <div class="text">
                        <h2 class="topic-heading">70</h2>
                        <h2 class="topic">Users Registration</h2>
                    </div>

                </div>
               
            </div>

           

 <?php
            include 'chart.php'; ?>
            </div>
        </div>
    </div>

    <script>let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
    nav.classList.toggle("navclose");
})</script>
</body>
</html>