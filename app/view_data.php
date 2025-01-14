<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Item</title>

    <link rel="icon" href="44.jpg" type="image/x-icon">

    <!-- css link -->
    <link rel="stylesheet"  href="view_data.css">
    
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
    <h1>Your Items</h1> 
    
    <div class="center"> <!-- Use the itemList class for styling -->
        <?php
        require 'config.php';

        if (!isset($_SESSION['id'])) {
            header("Location: login.php");
            exit();
        }

        $user_id = $_SESSION['id'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $view_sql = "SELECT * FROM items WHERE uid='$user_id'";
        $result = $conn->query($view_sql);
    
        if (!$result) {
            echo "Query Error: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='item'>"; // Apply 'item' and 'card' classes for styling
                echo "<h3>" . $row["name"] . "</h3>" .
                     "<p><i class='bx bxs-bowl-hot'></i> " . $row["category"] . "</p>" .
                     "<p>Rs:  " . $row["price"] . "</p>" .
                     "<p><i class='bx bxs-map-pin '></i> " . $row["city"] . "</p>" .
                     "<p>" . $row["link"] . "</p>";
                echo "<a href='edit_data.php?id=" . $row["id"] . "'>Edit</a>";
                echo "<a href='delete_data.php?delete_id=" . $row["id"] . "'>Delete</a>";
                echo "</div>"; // Close the 'item' container
                echo "<br><br>"; // Add spacing
            }
        } else {
            echo "<p class='no-data'>No data available.</p>"; // Apply styles to the message
        }

        $conn->close();
        ?>
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
    <script src="search.js"></script>
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
