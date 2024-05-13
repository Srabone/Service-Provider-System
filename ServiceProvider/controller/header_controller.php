<?php
include '../model/mydb.php';

// Initialize the database connection
$mydb = new model($conn);
$conobj = $mydb->OpenCon();

// Fetch user data
//$user = $_SESSION['username'];
$result = $mydb->getUserByUsername($_SESSION['username']);

// Check if the user data was fetched successfully
if ($result) {
    // Include the header view and pass the user data
    include '../view/header.php';
} else {
    // Handle the error (e.g., display an error message)
    echo "Error fetching user data.";
}
?>
