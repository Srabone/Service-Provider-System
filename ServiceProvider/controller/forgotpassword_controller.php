<?php
include '../view/session.php';

include '../model/mydb.php';

$username = $_POST['username'];
$newPassword = $_POST['newPassword'];

$mydb = new model();
$conn = $mydb->OpenCon();

$userExists = $mydb->getUserByUsername($conn, $username);

if ($userExists) {
    // Validate password length
    if (strlen($newPassword) >= 8) {
        $result = $mydb->resetPassword($conn, $username, $newPassword);
        
        if ($result) {
            echo "Password successfully changed.";
            header("Location: ../view/login.php");
        } else {
            echo "Password change failed. Please try again later.";
            header("Location: ../view/forgotpassword.php");
        }
    } else {
        echo "Password must be at least 8 characters long.";
        header("Location: ../view/forgotpassword.php");
    }
} else {
    echo "Invalid username.";
    header("Location: ../view/forgotpassword.php");
}
?>
