<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
    require_once('../Model/user-info-model.php');
  
    $result = getAllManager();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Delivery Person</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <br><br>
    <center><h1></h1>Manager List</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    Username
                </td>
                <td>
                    Email
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $userid=$w['UserID'];
                    $name=$w['Fullname'];
                    $username=$w['Username'];
                    $email=$w['Email'];
                    echo "    
                    <tr><td>$name</td>
                    <td>$username</td>
                    <td>$email</td> 
                    <td><a href=\"view-information.php?id={$userid}\">Show Details</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Manager Found</td></tr>";
            }
        ?>
        </table>
        </center>

        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>

     
</body>
</html>