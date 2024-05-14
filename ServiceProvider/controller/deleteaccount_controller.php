<?php
include '../view/session.php';
include '../model/mydb.php';
$username = $_POST['username'];
$currentPassword = $_POST['password']; // Current password

$mydb = new model();
$conn = $mydb->OpenCon();

$userExists = $mydb->getUserByUsername($conn, $username);

if ($userExists) {
    $validPassword = $mydb->verifyPassword($conn, $username, $currentPassword);

    if ($validPassword) {
        $result = $mydb->deleteAccount($conn, $username, $currentPassword); 
        if ($result) {
            echo "Account Successfully ended.";
            session_destroy(); 
            header("Location: ../view/signup.php");
            exit(); 
        } else {
            echo "Delete Account failed. Please try again later.";
            header("Location: ../view/deleteaccount.php");
            exit(); 
        }
    } else {
        header("Location: ../view/deleteaccount.php");
        echo "Invalid password.";
        exit();
    }
} else {
    header("Location: ../view/deleteaccount.php");
    echo "Invalid username.";
    exit(); 
}
?>
