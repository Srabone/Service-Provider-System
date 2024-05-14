function validateForm() {
    var username = document.forms["changePasswordForm"]["username"].value.trim();
    var sessionUsername = "<?php echo $_SESSION['username']; ?>";
    var currentPassword = document.forms["changePasswordForm"]["password"].value.trim();
    var newPassword = document.forms["changePasswordForm"]["newPassword"].value.trim();

    var errors = [];

    if (username === "") {
        errors.push("Username is required.");
    } else if (username !== sessionUsername) {
        errors.push("Incorrect username.");
    }

    if (currentPassword === "") {
        errors.push("Current password is required.");
    }

    if (newPassword === "") {
        errors.push("New password is required.");
    } else if (newPassword.length < 8) {
        errors.push("New password must be at least 8 characters long.");
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    
    alert("Password successfully changed.");
    return true;
}
