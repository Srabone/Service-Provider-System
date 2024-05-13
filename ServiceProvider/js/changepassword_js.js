function validateForm() {
    var username = document.forms["changePasswordForm"]["username"].value.trim();
    var sessionUsername = "<?php echo $_SESSION['username']; ?>";
    var currentPassword = document.forms["changePasswordForm"]["password"].value.trim();
    var newPassword = document.forms["changePasswordForm"]["newPassword"].value.trim();

    var errors = [];

    // Validate username
    if (username === "") {
        errors.push("Username is required.");
    } else if (username !== sessionUsername) {
        errors.push("Incorrect username.");
    }

    // Validate current password
    if (currentPassword === "") {
        errors.push("Current password is required.");
    }

    // Validate new password
    if (newPassword === "") {
        errors.push("New password is required.");
    } else if (newPassword.length < 8) {
        errors.push("New password must be at least 8 characters long.");
    }

    // Display errors if any
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    // If no errors, show success message
    alert("Password successfully changed.");
    return true;
}
