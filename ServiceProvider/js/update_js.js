function validateForm() {
    var username = document.forms["updateForm"]["username"].value;
    var newemail = document.forms["updateForm"]["newemail"].value;
    var newpnum = document.forms["updateForm"]["newpnum"].value;
    var newaddress = document.forms["updateForm"]["newaddress"].value;

    var errors = [];
    
    if (username === "") {
        errors.push("Username is required.");
    } else if (!/^[a-zA-Z]+\d+$/.test(username)) {
        errors.push("Invalid username format. Username should start with letters and contain numbers afterwards.");
    }
    if (newemail !== "" && !/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(newemail) && !newemail.endsWith("@gmail.com")) {
        errors.push("Invalid email format or does not end with @gmail.com.");
    }

    if (newpnum !== "" && !/^017[0-9]{8}$/.test(newpnum)) {
        errors.push("Invalid phone number format. Must start with 017 and have 11 digits.");
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    return true;
}
