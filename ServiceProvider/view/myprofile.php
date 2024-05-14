<?php
include 'session.php';
redirectToLogin(); 

include('../model/mydb.php');

$mydb = new model();
$conn = $mydb->OpenCon();

$username = $_SESSION["username"];

$userData = $mydb->getUserByUsername($conn, $username);

if($userData) {
    $name = $userData['name'];
    $email = $userData['email'];
    $pnum = $userData['pnum'];
    $address = $userData['address'];
} else {
    $name = "N/A";
    $email = "N/A";
    $pnum = "N/A";
    $address = "N/A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form>
        <h1 align='center'>Welcome, <?php echo $name; ?></h1>
        <p>Here are your details:</p>
        <table>
            <tr>
                <td><b>Email:</b></td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td><b>Phone Number:</b></td>
                <td><?php echo $pnum; ?></td>
            </tr>
            <tr>
                <td><b>Address:</b></td>
                <td><?php echo $address; ?></td>
            </tr>
        </table>
              <br>
        <div align='center'>
            <a href="../view/updateinformation.php" class="button">Update Information</a>
            <a href="../view/changepassword.php" class="button">Change Password</a>
            <a href="../view/deleteaccount.php" class="button">Delete Account</a>
        </div>     
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





