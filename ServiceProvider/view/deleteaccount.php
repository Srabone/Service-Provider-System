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
    <title>Delete Account</title>
</head>
<body>
<form action="../controller/deleteaccount_controller.php" method="post" novalidate>
<table align="center">
    <tr>
        <td>
    <fieldset>
        <legend><b>Delete Account<b></legend>

  <label for="username">Username:</label>
  <input type="text" name="username" >
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <br>
  <br>

  <label for="password">Password:</label>
  <input type="text" name="password" >
  <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>";?>
  <br>
</fieldset>
</td>
</tr>
</table>

 <p align="center"> <input type="submit" value="Delete Account"></p>
</form>
<div class="button-row-custom">
    <div class="button-container">
        <a href="../view/dashboard.php" class="custom-button green-button-custom">Back</a>
        <a href="../view/logout.php" class="button logout-button">Logout</a>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
