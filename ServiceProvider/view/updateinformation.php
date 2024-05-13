<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Update Information</title>
</head>
<body>
<form name="updateForm" action="../controller/updateinformation_controller.php" method="post" onsubmit="return validateForm()" novalidate>
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend><b>Update Information</b></legend>

                        <label for="username">Username:</label>
                        <input type="text" name="username" class="input-field">
                        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
                        <br>

                        <label for="newemail">Email:</label>
                        <input type="email" name="newemail" class="email-input">
                        <?php if (isset($_SESSION['errors']['newemail'])) echo "<p>{$_SESSION['errors']['newemail']}</p>"; ?>
                        <br>


                        <label for="newpnum">Phone Number:</label>
                        <input type="text" name="newpnum" class="input-field">
                        <?php if (isset($_SESSION['errors']['newpnum'])) echo "<p>{$_SESSION['errors']['newpnum']}</p>";?>
                        <br>

                        <label for="newaddress">Address:</label>
                        <input type="text" name="newaddress" class="input-field">
                        <?php if (isset($_SESSION['errors']['newaddress'])) echo "<p>{$_SESSION['errors']['newaddress']}</p>";?>
                        <br>
                    </fieldset>
                </td>
            </tr>
        </table>

        <p align="center">
            <input type="submit" value="Update Info">
        </p>
    </form>
    <script src="../js/update_js.js"></script>
    <div class="button-row-custom">
    <div class="button-container">
        <a href="../view/myprofile.php" class="custom-button green-button-custom">Back</a>
        <a href="../view/logout.php" class="button logout-button">Logout</a>
    </div>
</div>

<?php
include 'footer.php';
?> 

</body>
</html>
