<?php
session_start();

if (empty($_SESSION["username"])) {
    header("location: ../view/login.php"); 
    exit;
}
include '../model/mydb.php';
$username = $_SESSION["username"];
$mydb = new model();
$conobj = $mydb->OpenCon();
$servicetype = $mydb->getServiceType($conobj, $username);
$mydb->CloseCon($conobj);

switch ($servicetype) {
    case 'serviceprovider':
        header("location: reviewpage.php");
        exit;
    default:
        header("location: dashboard.php");
        exit;
}
?>
