<?php
include '../view/session.php';
include '../model/mydb.php';
$username = $_POST['username'];
$currentPassword = $_POST['password']; // Current password

$mydb = new model();
$conn = $mydb->OpenCon();

$userExists = $mydb->getUserByUsername($conn, $username);

if ($userExists) {
    // Verify the current password
    $validPassword = $mydb->verifyPassword($conn, $username, $currentPassword);

    if ($validPassword) {
        // Both username and password are verified, proceed to delete account
        $result = $mydb->deleteAccount($conn, $username, $currentPassword); // Using the method from the $mydb object

        if ($result) {
            echo "Account Successfully ended.";
            session_destroy(); // Destroy the session
            header("Location: ../view/signup.php");
            exit(); // Stop further execution
        } else {
            echo "Delete Account failed. Please try again later.";
            header("Location: ../view/deleteaccount.php");
            exit(); // Stop further execution
        }
    } else {
        // Password verification failed
        header("Location: ../view/deleteaccount.php");
        echo "Invalid password.";
        exit(); // Stop further execution
    }
} else {
    // Username verification failed
    header("Location: ../view/deleteaccount.php");
    echo "Invalid username.";
    exit(); // Stop further execution
}
?>
