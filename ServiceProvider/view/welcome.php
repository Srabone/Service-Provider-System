<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<h2>Home</h2>
Hii, <h3> <?php echo $_SESSION["username"];?></h3>
<br/><h5>Welcome to home page.</h5>

<form action="../controller/welcome_controller.php" method="post" novalidate>
    <?php if(isset($result)): ?>
        <h1>Welcome, <?php echo htmlspecialchars($result['username']); ?>!</h1>
        <a href='../view/myprofile.php'><b>Go to Profile</b></a><br><br>
        <a href='../view/forgotpassword.php'><b>Update Password</b></a><br><br>
        <a href='../view/servicelist.php'><b>Service Management</b></a><br><br>
        <a href='../view/dashboard.php'><b>Dashboard</b></a><br><br>
        <a href='../view/review.php'><b>Show Review and Give Feedback</b></a><br><br>
        <a href='../view/discount.php'><b>Give Offer</b></a><br><br>
        <a href='../view/payment.php'><b>Payment</b></a><br><br>
        <a href='../view/logout.php'><b>Logout</b></a><br><br>
    <?php else: ?>
        <p>User data not found.</p>
    <?php endif; ?>
</body>
</html>
