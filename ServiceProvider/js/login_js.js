function validateLoginForm() {
    var username = document.forms["loginForm"]["username"].value.trim();
    var password = document.forms["loginForm"]["password"].value.trim();

    var errors = [];
    var hasError = false;

    // Validate username
    if (username === "") {
        errors.push("Username is required.");
        hasError = true;
    }

    // Validate password
    if (password === "") {
        errors.push("Password is required.");
        hasError = true;
    }

    // Display errors if any
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    // If there's no error, return true to submit the form
    return true;
}
