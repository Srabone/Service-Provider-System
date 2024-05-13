<?php
include '../view/session.php';
include '../model/mydb.php'; // Include the database model

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Open database connection
    $mydb = new model();
    $conn = $mydb->OpenCon();

    // Authenticate user
    $result = $mydb->authenticate($conn, $username, $password);

    if ($result === true) {
        // Authentication successful, set session variables and redirect to welcome page
        $_SESSION['username'] = $username;
        header('Location: ../view/dashboard.php');
        exit;
    } else {
        // Authentication failed, set error message and redirect back to login page
        setSessionError('login', "Invalid username or password.");
        header('Location: ../view/login.php');
        exit;
    }
} else {
    // Check if session error is set before redirecting
    if (isset($_SESSION['errors']['login'])) {
        // Display error message and unset session error
        $errorMessage = $_SESSION['errors']['login'];
        unset($_SESSION['errors']['login']);
        
        // Redirect back to login page after alert is dismissed
        echo "<script>alert('$errorMessage'); window.location='../view/login.php';</script>";
        exit;
    }
    // Redirect back to login page if the form is not submitted and no session error is set
    // Avoid displaying the alert if the page is refreshed
    header('Location: ../view/login.php');
    exit;
}
?>
