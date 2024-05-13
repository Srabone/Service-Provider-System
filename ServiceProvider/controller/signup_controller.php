<?php
include '../view/session.php';
include '../model/mydb.php';

$nameError = $usernameError = $emailError = $passwordError = $pnumError = $genderError = $addressError = $servicetypeError = "";
$name = $username = $email = $password = $pnum = $gender = $address = $servicetype = "";

if (isset($_POST['submit'])) {
    // Validate form fields
    if (empty($_POST["name"]) || !preg_match("/^[a-zA-Z ]+$/", $_POST["name"])) {
        $nameError = "Name should only contain alphabets.";
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST["username"]) || !preg_match("/^[a-zA-Z]+\d+$/", $_POST["username"])) {
        $usernameError = "Username should start with letters and contain numbers afterwards.";
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST["email"]) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || substr($_POST['email'], -10) !== '@gmail.com') {
        $emailError = "Enter a valid email address with '@gmail.com' domain.";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST["password"]) || strlen($_POST["password"]) < 8) {
        $passwordError = "Password should be at least 8 characters long.";
    } else {
        $password = $_POST['password'];
    }

    if (empty($_POST["pnum"]) || !preg_match("/^017\d{8}$/", $_POST["pnum"])) {
        $pnumError = "Phone number format should be 017########.";
    } else {
        $pnum = $_POST["pnum"];
    }

    if (!isset($_POST["gender"])) {
        $genderError = "Select a gender.";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["address"])) {
        $addressError = "Address is required.";
    } else {
        $address = $_POST["address"];
    }

    if (!isset($_POST["servicetype"])) {
        $servicetypeError = "Select at least one service type.";
    } else {
        $servicetype = $_POST["servicetype"];
    }

    if (empty($nameError) && empty($usernameError) && empty($emailError) && empty($passwordError) && empty($pnumError) && empty($genderError) && empty($addressError) && empty($servicetypeError)) {
        $mydb = new model();
        $conobj = $mydb->OpenCon();

        if ($conobj) {
            $result = $mydb->adduserinfo($conobj, "userinfo", $name, $username, $email, $password, $pnum, $gender, $address, $servicetype);
            if ($result === TRUE) {
                header('Location: ../view/login.php');
                exit;
            } else {
                $_SESSION['errors']['signup'] = "Error occurred while adding user.";
            }
        } else {
            $_SESSION['errors']['signup'] = "Error occurred while connecting to database.";
        }
    } else {
        $_SESSION['errors']['signup'] = "Please fix the following errors.";
        $_SESSION['input'] = $_POST;
    }
}

header('Location: ../view/signup.php');
exit;
?>
