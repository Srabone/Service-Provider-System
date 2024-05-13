<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1 align='center'>Add Menu</h1>
    
    <form action="../controller/process_add_menu.php" method="post" novalidate>
        <table align='center'>
            <tr>
                <td>
                    <fieldset>
                        <legend><b>Give your Menu Details</b></legend>
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo isset($_SESSION['input']['name']) ? $_SESSION['input']['name'] : ''; ?>">
                        <?php if (isset($_SESSION['errors']['name'])) echo "<p>{$_SESSION['errors']['name']}</p>"; ?>
                        <br>
                        
                        <label for="description">Description:</label>
                        <textarea name="description"><?php echo isset($_SESSION['input']['description']) ? $_SESSION['input']['description'] : ''; ?></textarea>
                        <?php if (isset($_SESSION['errors']['description'])) echo "<p>{$_SESSION['errors']['description']}</p>"; ?>
                        <br>
                        
                        <label for="price">Price:</label>
                        <input type="number" name="price" value="<?php echo isset($_SESSION['input']['price']) ? $_SESSION['input']['price'] : ''; ?>">
                        <?php if (isset($_SESSION['errors']['price'])) echo "<p>{$_SESSION['errors']['price']}</p>"; ?>
                        <br>
                    </fieldset>
                </td>
            </tr>
        </table>
        <p align='center'><input type="submit" value="Add Menu"></p>
        <p align='center'><a href='menu.php'><b>Go to Menu</b></a></p>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
