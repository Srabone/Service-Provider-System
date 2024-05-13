function validateForm() {
    // Validate form fields
    var name = document.forms["signupForm"]["name"].value;
    var username = document.forms["signupForm"]["username"].value;
    var email = document.forms["signupForm"]["email"].value;
    var password = document.forms["signupForm"]["password"].value;
    var pnum = document.forms["signupForm"]["pnum"].value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var address = document.forms["signupForm"]["address"].value;
    var servicetype = document.querySelectorAll('input[name="servicetype"]:checked');

    // Flag to track errors
    var hasError = false;

    // Name validation
    if (name === "" || !/^[a-zA-Z ]+$/.test(name)) {
        window.alert("Name should only contain alphabets.");
        hasError = true;
    }

    // Username validation
    if (username === "" || !/^[a-zA-Z]+\d+$/.test(username)) {
        window.alert("Username should start with letters and contain numbers afterwards.");
        hasError = true;
    }

    // Email validation
    if (email === "" || !/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email) || !email.endsWith("@gmail.com")) {
        window.alert("Enter a valid email address with '@gmail.com' domain.");
        hasError = true;
    }

    // Password validation
    if (password === "" || password.length < 8) {
        window.alert("Password should be at least 8 characters long.");
        hasError = true;
    }

    // Phone number validation
    if (pnum === "" || !/^017\d{8}$/.test(pnum)) {
        window.alert("Phone number format should be 017########.");
        hasError = true;
    }

    // Gender validation
    if (!gender) {
        window.alert("Select a gender.");
        hasError = true;
    }

    // Address validation
    if (address === "") {
        window.alert("Address is required.");
        hasError = true;
    }


    // Return true if there are no errors, else false
    return !hasError;
}
