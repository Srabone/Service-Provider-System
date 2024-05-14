<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Details</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form>
    
    <?php include 'header.php'; ?>

    

    <div class="added-work-container">
        <table id="added-work-table">
        <h2>My Selected Work</h2>
            <thead>
                <tr>
                    <th>Work Name</th>
                    <th>Work Details</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../controller/servicelist_data.php'; ?> 
            </tbody>
        </table>

        <?php if (isset($totalPrice) && $totalPrice > 0): ?>
            <h1 align='center'>Your total income is: $<?php echo $totalPrice; ?></h1>
        <?php endif; ?> 
    </div>

    <div class="button-row-custom">
        <div class="button-container">
            <a href="../view/dashboard.php" class="custom-button green-button-custom">Back</a>
            <a href="../view/logout.php" class="button logout-button">Logout</a>
        </div>
    </div>
        </form>

    <?php include 'footer.php'; ?> 
</body>
</html>
