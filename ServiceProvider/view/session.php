<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to set session error
function setSessionError($key, $message) {
    $_SESSION['errors'][$key] = $message;
}

// Function to unset session errors
function unsetSessionErrors() {
    if (isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
    }
}

// Function to set session input data
function setSessionInput($input) {
    $_SESSION['input'] = $input;
}

// Function to unset session input data
function unsetSessionInput() {
    if (isset($_SESSION['input'])) {
        unset($_SESSION['input']);
    }
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Function to redirect to login page if user is not logged in
function redirectToLogin() {
    if (!isLoggedIn()) {
        header("location: ../view/login.php");
        exit;
    }
}
?>
