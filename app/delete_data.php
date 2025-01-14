<?php
require 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$user_id = $_SESSION['id'];

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete data
    $delete_sql = "DELETE FROM items WHERE id='$delete_id' AND uid='$user_id'";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: view_data.php"); // Redirect back to view_data.php after successful deletion
        exit();
    } else {
        echo "Error deleting data: " . $conn->error;
    }

    $conn->close();
}
?>
