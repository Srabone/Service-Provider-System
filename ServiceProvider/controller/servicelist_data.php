<?php
include '../model/mydb.php';
session_start();

$totalPrice = 0; // Initialize total price
if (isset($_SESSION['username'])) {
    $mydb = new model();
    $conobj = $mydb->OpenCon();

    $addedWorkResult = $mydb->getAddedWorkForUser($conobj, $_SESSION['username']);

    if ($addedWorkResult && $addedWorkResult->num_rows > 0) {
        while ($row = $addedWorkResult->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['workname']}</td>
                    <td>{$row['workdetails']}</td>
                    <td>{$row['price']}</td>
                  </tr>";
            $totalPrice += $row['price']; 
        }
    } else {
        echo "<tr><td colspan='3'>No work added yet.</td></tr>";
    }

    $mydb->CloseCon($conobj);
} else {
    echo "<tr><td colspan='3'>Please log in to view your selected work.</td></tr>";
}
?>
