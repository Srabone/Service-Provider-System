<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/changepassword_js.js"></script>
    <title>Change Password</title>
</head>
<body>
<form action="../controller/changepassword_controller.php" method="post" novalidate onsubmit="return validateForm()">
<table align="center">
    <tr>
        <td>
    <fieldset>
        <legend><b>Change Password<b></legend>

  <label for="username">Username:</label>
  <input type="text" name="username" >
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <br>
  <br>

  <label for="password">Current Password:</label>
  <input type="text" name="password" >
  <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>";?>
  <br>
<br>
  <label for="newPassword">New Password:</label>
  <input type="text" name="newPassword" >
  <?php if (isset($_SESSION['errors']['newPassword'])) echo "<p>{$_SESSION['errors']['newPassword']}</p>";?>
  <br>
</fieldset>
</td>
</tr>
</table>
<div class="button-row-custom">
    <input type="submit" value="Change Password" class="custom-button green-button-custom">
</div>
</form>
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
