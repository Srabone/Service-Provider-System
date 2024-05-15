<?php 
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div id="adminhome-header">
                <button name="x"><a class="home" href="view-information.php">View Information</a></button>
                <br><br>
                <button name="x"><a class="home" href="edit-information.php">Edit Information</a></button>
               
                <br><br>
                <button name="x"><a class="home" href="update-password.php">Update Password</a></button>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                
                
    </div>            

</body>
</html>