<?php
include 'session.php';
redirectToLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/slideshow.js"></script>
</head>
<body>
    <header>
        <h2>Welcome, <?php echo $_SESSION["username"];?></h2>
    </header>

    <form>
        <div id="slideshow"></div>
        <div id="graph-container">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div class="button-container">
            <div class="button-row">
            <a href="../view/myprofile.php" class="button">My Profile</a>
            </div>
            <div class="button-row">
                <a href="../view/viewservice.php" class="button">My Service</a>
                <a href="../view/financials.php" class="button">Financials</a>
            </div>
            <div class="button-row">
                <a href="../view/seeallservices.php" class="button">See All Services</a>
                <a href="../view/review.php" class="button">See Review</a>
            </div>
        </div>
    </form>
    <footer>
        <a href="../view/logout.php" class="logout-button">Logout</a>
    </footer>

    <?php
        include 'footer.php';
    ?>
</body>
</html>
