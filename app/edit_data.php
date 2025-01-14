<!-- edit_data.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $id = $_POST['id']; 
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $city = $_POST['city'];
        $link = $_POST['link'];
       
        // Update SQL query
        $update_sql = "UPDATE items SET name='$name', category='$category', price='$price', city='$city', link='$link' WHERE id=$id";
       
        if ($conn->query($update_sql) === TRUE) {
            echo '<div class="success-message">Data updated successfully.</div>';
        } else {
            echo '<div class="error-message">Error updating data: ' . $conn->error . '</div>';
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $select_sql = "SELECT * FROM items WHERE id=$id";
        $result = $conn->query($select_sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            ?>
        <h1>Edit Item</h1>
        <div class="form-container">
            <form method="post" action="edit_data.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                Category:
                <select name="category">
                    <option value="Healthy Food" <?php if ($row['category'] == 'Healthy Food') echo 'selected'; ?>>Healthy Food</option>
                    <option value="Normal Food" <?php if ($row['category'] == 'Normal Food') echo 'selected'; ?>>Normal Food</option>
                </select><br>
                Price: <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
                City: <input type="text" name="city" value="<?php echo $row['city']; ?>"><br>
                Map Link: <input type="text" name="link" value="<?php echo $row['link']; ?>"><br>
                <input type="submit" name="submit" value="Update Data">
            </form>
        </div>

            
            <?php
        } else {
            echo "Record not found.";
        }

        $conn->close();
    }
    ?>
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
