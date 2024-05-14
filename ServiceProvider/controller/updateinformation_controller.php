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

    if (empty($newemail)) {
        $newemail = $mydb->getUserByEmail($conn, $username)['email'];
    } elseif (!filter_var($newemail, FILTER_VALIDATE_EMAIL) || substr($newemail, -10) !== "@gmail.com") {
        $errors[] = "Invalid email format or does not end with @gmail.com.";
    }
    
    if (empty($newpnum)) {
        $newpnum = $mydb->getUserByPnum($conn, $username)['pnum'];
    } elseif (!preg_match("/^017[0-9]{8}$/", $newpnum)) {
        $errors[] = "Invalid phone number format. Must start with 017 and have 11 digits.";
    }

    if (empty($newaddress)) {
        $newaddress = $mydb->getUserByAddress($conn, $username)['address'];
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../view/updateinformation.php");
        exit;
    }

    $result = $mydb->updateInformation($conn, $username, $newemail, $newpnum, $newaddress);
    
    if ($result) {
        $_SESSION['update_success'] = "Information successfully updated.";
        header("Location: ../view/myprofile.php");
        exit;
    } else {
        echo "Failed to update information. Please try again later.";
        header("Location: ../view/updateinformation.php");
    }

} else {
    $_SESSION['errors'] = ["Invalid username."];
    header("Location: ../view/updateinformation.php");
    exit;
}
?>
