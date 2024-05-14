<?php
include '../model/mydb.php';
session_start();

$mydb = new model();
$conobj = $mydb->OpenCon();
$result = $mydb->fetchWorkList($conobj);

if ($result !== null && $result->num_rows > 0) {
    echo "<form method='post' action=''>"; 
    echo "<div class='work-list-container'>";
    echo "<table>";
    echo "<tbody>";
    echo "<tr><th>Work Name</th><th>ID</th><th>Work Details</th><th>Price</th></tr>"; 

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["workname"] . "</td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["workdetails"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</form>"; 
} else {
    echo "<p>No work list found.</p>";
}


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

$mydb->CloseCon($conobj);
?>
