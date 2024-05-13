<?php
include '../view/session.php';
include '../model/mydb.php';

$mydb = new model();
$conobj = $mydb->OpenCon();

if (!isset($_SESSION['username'])) {
    header('Location: ../view/login.php');
    exit;
}

// Fetch user data from database
$username = $_SESSION['username'];
$result = $mydb->getUserByUsername($conobj, $username);

// Check if user data is found
if ($result && $result->num_rows > 0) {
    // User data found, fetch the first row
    $user = $result->fetch_assoc();
} else {
    // User data not found or empty result
    $user = null;
}

// Load the view
include '../view/welcome.php';
?>
