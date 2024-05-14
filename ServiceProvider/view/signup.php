<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider Signup</title>
    <script src="../js/signup_js.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form name="signupForm" action="../controller/signup_controller.php" method="post" onsubmit="return validateForm()" novalidate>
    <h2 align="center">Service Provider Signup</h2>
    <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend><b>Service Info</b></legend>
                        <label for="servicetype">Type of Service Provider:</label>
                        <select name="servicetype">
                            <option value="serviceprovider">Service Provider</option>
                            
                        </select>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend><b>User Info</b></legend>
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo isset($_SESSION['input']['name']) ? $_SESSION['input']['name'] : ''; ?>">
                        <span id="nameError"><?php echo isset($_SESSION['errors']['nameError']) ? $_SESSION['errors']['nameError'] : ''; ?></span><br>

                        <label for="username">Username:</label>
                        <input type="text" name="username" value="<?php echo isset($_SESSION['input']['username']) ? $_SESSION['input']['username'] : ''; ?>">
                        <span id="usernameError"><?php echo isset($_SESSION['errors']['usernameError']) ? $_SESSION['errors']['usernameError'] : ''; ?></span><br>

                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo isset($_SESSION['input']['email']) ? $_SESSION['input']['email'] : ''; ?>">
                        <span id="emailError"><?php echo isset($_SESSION['errors']['emailError']) ? $_SESSION['errors']['emailError'] : ''; ?></span><br>

                        <label for="password">Password:</label>
                        <input type="password" name="password">
                        <span id="passwordError"><?php echo isset($_SESSION['errors']['passwordError']) ? $_SESSION['errors']['passwordError'] : ''; ?></span><br>

                        <label for="pnum">Phone Number:</label>
                        <input type="text" name="pnum" value="<?php echo isset($_SESSION['input']['pnum']) ? $_SESSION['input']['pnum'] : ''; ?>">
                        <span id="pnumError"><?php echo isset($_SESSION['errors']['pnumError']) ? $_SESSION['errors']['pnumError'] : ''; ?></span><br>

                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female
                        <input type="radio" name="gender" value="other"> Other
                        <span id="genderError"><?php echo isset($_SESSION['errors']['genderError']) ? $_SESSION['errors']['genderError'] : ''; ?></span><br>

                        <label for="address">Address:</label>
                        <textarea name="address"><?php echo isset($_SESSION['input']['address']) ? $_SESSION['input']['address'] : ''; ?></textarea>
                        <span id="addressError"><?php echo isset($_SESSION['errors']['addressError']) ? $_SESSION['errors']['addressError'] : ''; ?></span><br>
                    </fieldset>
                </td>
            </tr>
        </table>
        <p align="center"><input type="submit" name="submit" value="Signup"></p>
        <p align="center"><?php echo "<a href='../view/login.php'><b>Already have an account?</b></a>"; ?></p>
    </form>
</body>
</html>