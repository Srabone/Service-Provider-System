<?php
session_start(); // Start the session

if (empty($_SESSION["username"])) {
    header("location: ../view/login.php"); // Redirecting To Home Page
    exit; // Terminate script execution after redirection
}

include '../model/mydb.php';

// Get the servicetype of the logged-in user
$username = $_SESSION["username"];
$mydb = new model();
$conobj = $mydb->OpenCon();
$servicetype = $mydb->getServiceType($conobj, $username);
$mydb->CloseCon($conobj);

// Redirect based on the servicetype
switch ($servicetype) {
    case 'serviceprovider':
        header("location: reviewpage.php");
        exit;
    default:
        // Default redirection if servicetype is not recognized
        header("location: dashboard.php");
        exit;
}
?>
