
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodc</title>
    <link rel="icon" href="44.jpg" type="image/x-icon">
    <!-- css link -->
    <link rel="stylesheet"  href="index.css">
    
    <!-- boxicons link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@900&family=Noto+Sans:wght@900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- Header design-->
    <header id="hdd">
        <img src="aa.png" class="logo" alt="">
        <?php
        // Display the container name
        echo "<p style='text-align:center; font-size:18px; color:blue;'>Served by container: " . gethostname() . "</p>";
    ?>
        <ul class="navbar" id="sidemenu">
            <li><a href="about.php">About us</a></li>
            <button type="button" onclick="location.href='login.php'" class="btnlogin-popup">Login</button>
            <button type="button" onclick="location.href='register.php'" class="btnlogin-popup">Register</button>
            <i class='bx bxs-x-square' onclick="closemenu()"></i>
        </ul>
        <i class='bx bx-menu' onclick="openmenu()"></i>
    </header>
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
    <div class="content1">
        <!-- <h4>Welcome to </h4> -->
        <h1>FoodC</h1>
        <h2> View Your Eats</h2>
        <p class="kk">To your budget ,we suggest a boutique.
            Where you are, food is there. <br>
            No worries, Eat buddies <br>
        </p>
        <button type="button" onclick="location.href='login.php'">Login</button>
        <button type="button" onclick="location.href='register.php'">Register</button>

    </div>

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