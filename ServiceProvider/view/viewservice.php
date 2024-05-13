<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Details</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form>
        <!-- Your service details view goes here -->
        <?php include 'header.php'; ?>
        
        <h2>Service Details</h2>
        <div class="service-details-container">
            <!-- Display fetched service details here -->
            <?php include '../controller/viewservice_controller.php'; ?>
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

