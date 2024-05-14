<?php
include '../view/session.php';
include '../model/mydb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mydb = new model();
    $conn = $mydb->OpenCon();

    $result = $mydb->authenticate($conn, $username, $password);

    if ($result === true) {
        $_SESSION['username'] = $username;
        header('Location: ../view/dashboard.php');
        exit;
    } else {
        setSessionError('login', "Invalid username or password.");
        header('Location: ../view/login.php');
        exit;
    }
} else {
    if (isset($_SESSION['errors']['login'])) {
        $errorMessage = $_SESSION['errors']['login'];
        unset($_SESSION['errors']['login']);
        echo "<script>alert('$errorMessage'); window.location='../view/login.php';</script>";
        exit;
    }
    header('Location: ../view/login.php');
    exit;
}
?>
