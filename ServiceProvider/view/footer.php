<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Provider</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<footer align="center" class="footer">
    <?php
    // Set timezone to Bangladesh
    date_default_timezone_set('Asia/Dhaka');

    // Get current date and time in Bangladeshi format
    $currentDateTime = date('l, F j, Y, g:i A');
    ?>
    <p><?php echo $currentDateTime; ?></p>
    <p>Service Provider. All rights reserved.</p>
</footer>

</body>
</html>
