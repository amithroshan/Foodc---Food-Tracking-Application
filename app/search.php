<!-- index.php -->

<?php
require 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);
$items = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Items</title>

    <link rel="icon" href="44.jpg" type="image/x-icon">

    <!-- css link -->
    <link rel="stylesheet"  href="search.css">
    
    <!-- boxicons link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@900&family=Noto+Sans:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header design-->
    <header id="hdd">
        <a href="home.php">
        <img src="aa.png" class="logo" alt="">
        </a>
        <ul class="navbar" id="sidemenu">
            <li><a href="home.php">Home</a></li>
            <button type="button" onclick="location.href='logout.php'" class="btnlogin-popup">Logout</button>
            <i class='bx bxs-x-square' onclick="closemenu()"></i>
        </ul>
        <i class='bx bx-menu' onclick="openmenu()"></i>
    </header>
    <h1>Search Your Items</h1>
    <div class="center">
        <input type="text" id="searchInput" placeholder="Search by Food Name">
        <input type="text" id="searchcity" placeholder="Search by City">
        <select id="categoryFilter">
            <option value="">All Categories</option>
            <option value="Healthy Food">Healthy Food</option>
            <option value="Normal Food">Normal Food</option>
        </select>
        <input type="number" id="priceRangeMin" placeholder="Min Price">
        <input type="number" id="priceRangeMax" placeholder="Max Price">
    </div>
     
    
    <div id="itemList"></div>
    
    <footer>
        <div class="footer-content">
            <ul class="socials">
                <li><a href="#"><i class='bx bxl-facebook-circle'></i></i></a></li>
                <li><a href="#"><i class='bx bxl-instagram-alt' ></i></i></a></li>
                <li><a href="#"><i class='bx bxl-linkedin-square' ></i></i></a></li>
                <li><a href="#"><i class='bx bxl-whatsapp-square' ></i></i></a></li>
                <li><a href="#"><i class='bx bxs-envelope'></i></a></li>
            </ul>
        </div>
        <div class="footer-bootom">
            <p>Copyright © FoodC All rights reserved</p>
        </div>
    </footer>
    <script src="search.js"></script>
    <!-- Custom js link -->
    <script>
     
     var sidemenu = document.getElementById("sidemenu");

     function openmenu(){
        sidemenu.style.right = "0";

     }
     function closemenu(){
        sidemenu.style.right ="-300px";
     }
     

    </script>
</body>
</html>
