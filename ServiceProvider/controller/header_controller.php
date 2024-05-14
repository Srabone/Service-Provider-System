<?php
include '../model/mydb.php';
$mydb = new model($conn);
$conobj = $mydb->OpenCon();

//$user = $_SESSION['username'];
$result = $mydb->getUserByUsername($_SESSION['username']);

if ($result) {
    include '../view/header.php';
} else {
    echo "Error fetching user data.";
}
?>
