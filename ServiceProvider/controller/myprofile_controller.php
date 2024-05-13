<?php
// Include the database model to fetch users
include '../model/mydb.php';

// Create an instance of the database model
$mydb = new model();

// Open database connection
$conn = $mydb->OpenCon();

// Fetch all users from the database
$result = $mydb->fetchmyprofile($conn, $username);

// Display users in a table format
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Username</th><th>Email</th><th>Password</th><th>Phone Number</th><th>Gender</th><th>Address</th><th>Service Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td>".$row['pnum']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['servicetype']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

// Close database connection
$mydb->CloseCon($conn);
?>
