<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Details</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <?php include 'header.php'; ?>
</head>
<body>
    
   <form>
    

    <h2 align = 'center'>Service Details</h2>
    <div class="service-details-container">
        <?php include '../controller/seeallservice_controller.php'; ?> 
    </div>

    <div class="button-row-custom">
        <div class="button-container">
            <a href="../view/dashboard.php" class="custom-button green-button-custom">Back</a>
            <a href="../view/logout.php" class="button logout-button">Logout</a>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
   </form> 
</body>
</html>

