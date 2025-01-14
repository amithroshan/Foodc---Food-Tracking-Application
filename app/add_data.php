<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>

    <link rel="icon" href="44.jpg" type="image/x-icon">

    <!-- css link -->
    <link rel="stylesheet"  href="edit_data.css">
    
    <!-- boxicons link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@900&family=Noto+Sans:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <header id="hdd">
        <a href="shop.php">
        <img src="aa.png" class="logo" alt="">
        </a>
        <ul class="navbar" id="sidemenu">
            <li><a href="shop.php">Home</a></li>
            <button type="button" onclick="location.href='logout.php'" class="btnlogin-popup">Logout</button>
            <i class='bx bxs-x-square' onclick="closemenu()"></i>
        </ul>
        <i class='bx bx-menu' onclick="openmenu()"></i>
    </header>
    <?php
    require 'config.php';

    if (!isset($_SESSION['id'])) {
        header("Location: login.php"); // Redirect if not logged in
        exit();
    }
    
    $user_id = $_SESSION['id'];
    $messageClass = ""; // Initialize the class as empty
    $messageText = "";  // Initialize the text as empty
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Create a connection
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $city = $_POST['city'];
        $link = $_POST['link'];
        
        $sql = "INSERT INTO items (name, category, price, city, link, uid) VALUES ('$name', '$category', '$price', '$city', '$link', '$user_id')";
    
        if ($conn->query($sql) === TRUE) {
            $messageClass = "success-message"; // CSS class for success message
            $messageText = "Data added successfully.";
        } else {
            $messageClass = "error-message"; // CSS class for error message
            $messageText = "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();

    }
    ?>
    <div class="<?php echo $messageClass; ?>"><?php echo $messageText; ?></div> <!-- Success message at the top -->
    <h1>Add Item</h1>
    <div class="form-container">
        <form method="post" action="add_data.php">
            Name: <input type="text" name="name"><br>
            Category:
            <select name="category">
                <option value="Healthy Food">Healthy Food</option>
                <option value="Normal Food">Normal Food</option>
            </select><br>
            Price: <input type="text" name="price"><br>
            City: <input type="text" name="city"><br>
            Map Link: <input type="text" name="link"><br>
            <input type="submit" name="submit" value="Add Data">
        </form>
    </div>
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
