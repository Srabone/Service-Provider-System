<?php
include '../model/mydb.php';

$mydb = new model();
$conobj = $mydb->OpenCon();
$result = $mydb->fetchWorkList($conobj);

if ($result !== null && $result->num_rows > 0) {
    echo "<div class='work-list-container'>";
    echo "<table>";
    echo "<tbody>";
    echo "<tr><th>Work Name</th><th>ID</th><th>Work Details</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        //echo "<table>";
        echo "<tr>";
        echo "<td>" . $row["workname"] . "</td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["workdetails"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "</tr>";
        //echo "</table>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<p>No work list found.</p>";
}

$mydb->CloseCon($conobj); // Don't forget to close the database connection
?>
