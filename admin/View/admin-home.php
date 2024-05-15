<?php

    session_start();
    if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=signIn');

    require_once('../Model/user-info-model.php');

    $id = $_COOKIE['id'];
    $row=  userInfo($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Home</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div id="adminhome-header">

     <br><br>
     

    <button name="y"><a class="home" href="profile.php">Profile</a></button> 


    <button name="z"><a class="home" href="../Controller/logout-controller.php">Logout</a></button><br><br>


    <button name="x"><a class="home" href="view-all-manager.php">View All Manager</a></button>
    <br><br>
    
    <button name="x"><a class="home" href="recruit-manager.php">Recruit Manager</a></button>
    <br><br>
    
    <button name="x"><a class="home" href="approve-customer-review.php">Approve Customer Review</a></button>
    <br><br><br><br><br><br><br><br>
    
       
        
    </div>
</body>
</html>
