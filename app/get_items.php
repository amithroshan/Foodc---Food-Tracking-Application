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
        // Assuming the link is stored in the 'link' field in your database
        $row['link'] = $row['link']; // Replace 'link' with the actual field name
        $items[] = $row;
    }
}


mysqli_close($conn);

// Return the items as JSON
header('Content-Type: application/json');
echo json_encode($items);
?>
