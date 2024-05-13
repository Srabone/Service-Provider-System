<?php
include 'session.php';
// Redirect to login page if user is not logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Forgot Password</title>
</head>
<body>
<form action="../controller/forgotpassword_controller.php" method="post" novalidate>
<table align="center">
    <tr>
        <td>
    <fieldset>
        <legend><b>Forgot Password<b></legend>

  <label for="username">Username:</label>
  <input type="text" name="username" >
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
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

 <p align="center"> <input type="submit" value="Reset Password"></p>
</form>
<p align="center"><?php echo "<a href='../view/login.php'><b>Back to Login</b></a>"?><br></p>
<p align="center"><?php echo "<a href='../view/signup.php'><b>Create New Account</b></a>"?><br></p>
<?php
include 'footer.php';
?>
</body>
</html>
