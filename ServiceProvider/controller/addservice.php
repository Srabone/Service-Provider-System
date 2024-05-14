<?php
include '../model/mydb.php';
session_start();

$mydb = new model();
$conobj = $mydb->OpenCon();


if (isset($_POST['add']) && isset($_SESSION['username'])) {  
    $username = $_SESSION['username'];
    $workId = $_POST['add'];
    $addResult = $mydb->addWorkToUser($conobj, $username, $workId);

    if ($addResult) {
        echo "<p class='success-message'>Work added successfully!</p>";
    } else {
        echo "<p class='error-message'>Failed to add work.</p>";
    }
}

if (isset($_SESSION['username'])) {
    $addedWorkResult = $mydb->getAddedWorkForUser($conobj, $_SESSION['username']);

    if ($addedWorkResult && $addedWorkResult->num_rows > 0) {
        $tableRows = "";
        while ($row = $addedWorkResult->fetch_assoc()) {
            $tableRows .= "<tr><td>{$row['workname']}</td><td>{$row['workdetails']}</td><td>{$row['price']}</td></tr>";
        }
        echo "<script>
            document.querySelector('#added-work-table tbody').innerHTML = '$tableRows';
        </script>";
    } else {
        echo "<script>
            document.getElementById('no-work-message').style.display = 'block';
        </script>";
    }
} else {
    echo "<script>
        document.getElementById('login-message').style.display = 'block';
    </script>";
}

$mydb->CloseCon($conobj);
?>
