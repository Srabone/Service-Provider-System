<?php
include '../view/session.php';
include '../model/mydb.php';

$username = $_POST['username'];
$newemail = $_POST['newemail'];
$newpnum = $_POST['newpnum'];
$newaddress = $_POST['newaddress'];

$mydb = new model();
$conn = $mydb->OpenCon();

$userExists = $mydb->getUserByUsername($conn, $username);

if ($userExists) {
    $errors = [];

    // Validate email, phone number, and address (same as your existing logic)
    if (empty($newemail)) {
        $newemail = $mydb->getUserByEmail($conn, $username)['email'];
    } elseif (!filter_var($newemail, FILTER_VALIDATE_EMAIL) || substr($newemail, -10) !== "@gmail.com") {
        $errors[] = "Invalid email format or does not end with @gmail.com.";
    }
    
    // Validate phone number
    if (empty($newpnum)) {
        $newpnum = $mydb->getUserByPnum($conn, $username)['pnum'];
    } elseif (!preg_match("/^017[0-9]{8}$/", $newpnum)) {
        $errors[] = "Invalid phone number format. Must start with 017 and have 11 digits.";
    }

    // Validate address
    if (empty($newaddress)) {
        $newaddress = $mydb->getUserByAddress($conn, $username)['address'];
    }

    // Redirect back to update page if there are errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../view/updateinformation.php");
        exit;
    }

    // Proceed with updating user information
    $result = $mydb->updateInformation($conn, $username, $newemail, $newpnum, $newaddress);
    
    if ($result) {
        // Information successfully updated
        $_SESSION['update_success'] = "Information successfully updated.";
        header("Location: ../view/myprofile.php");
        exit;
    } else {
        // Update failed
        echo "Failed to update information. Please try again later.";
        header("Location: ../view/updateinformation.php");
    }

} else {
    // Username does not exist in the database
    $_SESSION['errors'] = ["Invalid username."];
    header("Location: ../view/updateinformation.php");
    exit;
}
?>
