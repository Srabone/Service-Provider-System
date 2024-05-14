<?php
include '../view/session.php';
include '../model/mydb.php';
$username = $_POST['username'];
$currentPassword = $_POST['password']; // Current password
$newPassword = $_POST['newPassword'];

$mydb = new model();
$conn = $mydb->OpenCon();

$userExists = $mydb->getUserByUsername($conn, $username);
if ($userExists) {
    $validPassword = $mydb->verifyPassword($conn, $username, $currentPassword);

    if ($validPassword) {
        if (strlen($newPassword) >= 8) {
            $result = $mydb->resetPassword($conn, $username, $newPassword);

            if ($result) {
                echo "Password successfully changed.";
                header("Location: ../view/myprofile.php");
                exit(); 
            } else {
                echo "Password change failed. Please try again later.";
                header("Location: ../view/changepassword.php");
                exit(); 
            }
        } else {
            echo "New password must be at least 8 characters long.";
            header("Location: ../view/changepassword.php");
            exit(); n
        }
    } else {
        echo "Invalid current password.";
        header("Location: ../view/changepassword.php");
        exit(); 
    }
} else {
    echo "Invalid username.";
    header("Location: ../view/changepassword.php");
    exit();
}
?>