<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];

  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong username or password.";
        break;
      }
    case 'bannedUser': {
        $error_msg = "Your account is currently banned.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
    case 'signIn': {
        $error_msg = "Sign in to gain access.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please sign in.";
        break;
      }
    case 'changed': {
        $success_msg = "Password change successful. Please sign in.";
        break;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="CSS/style.css"> 
  <script src="JS/script.js"></script>
</head>

<body>


  <center>
    <form onsubmit="return validateSignIn(this);" method="post" action="../Controller/sign-in-controller.php" novalidate>
      <h1>Sign In</h1><br><br>
      <b>Email</b><br>
      <input type="email" name="email" size="43px">
      <p id="emailError"></p>
      <b>Password </b><br>
      <input type="password" name="password" size="43px" id="password">
      <p id="passwordError"></p>
      <br><br>
      <?php if (!empty($error_msg)) echo $error_msg . "<br><br>" ?>
      <?php if (!empty($success_msg)) echo $success_msg . "<br><br>" ?>
      <button size="250px" name="submit" id="login">Sign In</button>
      <br><br><br>
    </form>
    <a class="forgot-password-link" href="forgot-password.php"><button name="forgot-password">Forgot Password</button></a>
  </center>
  <br><br><br>
  </div>
  <div id="signin-header">
    <center><a class="sign-up" href="sign-up.php"><button name="sign-up">Create Account</button></a></center>

</body>

</html>