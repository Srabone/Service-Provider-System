<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function setSessionError($key, $message) {
    $_SESSION['errors'][$key] = $message;
}

function unsetSessionErrors() {
    if (isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
    }
}

function setSessionInput($input) {
    $_SESSION['input'] = $input;
}

function unsetSessionInput() {
    if (isset($_SESSION['input'])) {
        unset($_SESSION['input']);
    }
}

function isLoggedIn() {
    return isset($_SESSION['username']);
}

function redirectToLogin() {
    if (!isLoggedIn()) {
        header("location: ../view/login.php");
        exit;
    }
}
?>
