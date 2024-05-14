<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="../js/login_js.js"></script>
  <title>Login</title>
</head>
<body>
  <?php 
    include 'session.php'; // Include the session.php ONCE at the beginning
  ?>

  <h1 align="center">Service Provider Login</h1>
  <form action="../controller/login_controller.php" method="post" novalidate onsubmit="return validateLoginForm()" name="loginForm">
    <table align="center">
      <tr>
        <td>
          <fieldset>
            <legend><b>Login</b></legend>
            <table>
              <tr>
                <td>
                  <label for="username">Username:</label>
                  <input type="text" name="username" value="<?php echo isset($_SESSION['input']['username']) ? $_SESSION['input']['username'] : ''; ?>">
                  <br>

                  <label for="password">Password:</label>
                  <input type="password" name="password">
                  <br>
                </td>
              </tr>
            </table>
          </fieldset>

          <a href='signup.php'><b>Create New Account</b></a><br>
          <a href='forgotPassword.php'><b>Forgotten password?</b></a>
          <p align="center"><input type="submit" name="submit" value="Login"></p>
        </td>
      </tr>
    </table>
  </form>

  <?php if (isset($_SESSION['errors']['login'])): ?>
    <script>alert("<?php echo $_SESSION['errors']['login']; ?>");</script>
    <?php unsetSessionErrors(); ?>
  <?php endif; ?>

  <?php include 'footer.php'; ?>
</body>
</html>
