<?php
class model
{
    function OpenCon()
    {
        $conn = new mysqli("localhost", "root", "", "provider"); 
        return $conn;
    }

    function adduserinfo($conn, $userinfo, $name, $username, $email, $password, $pnum, $gender, $address, $servicetype)
    {
        $sql = "INSERT INTO $userinfo (name, username, email, password, pnum, gender, address, servicetype) VALUES ('$name', '$username','$email', '$password','$pnum', '$gender','$address', '$servicetype')";
        $result = $conn->query($sql);
        return $result;
    }

    function fetchAllUsers($conn)
{
    $sql = "SELECT * FROM userinfo";
    $result = $conn->query($sql);
    return $result;
}

function fetchmyprofile($conn, $username)
{
    $sql = "SELECT * FROM userinfo WHERE username = '$username'";
    $result = $conn->query($sql);
    return $result;
}

function fetchWorkListByServiceType($conn, $username, $serviceType)
  {
    $sql = "SELECT w.id, w.workname, w.workdetails, w.price 
              FROM userinfo u 
              JOIN worklist w ON u.servicetype = w.servicetype 
              WHERE u.username = '$username' AND u.servicetype = '$serviceType'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $services = $result->fetch_all(MYSQLI_ASSOC);
      return $services;
    } else {
      return null; // Return null if no services found (not an error)
    }
  }

  function fetchWorkList($conn) {
    $sql = "SELECT * FROM worklist";
    $result = $conn->query($sql);
    return $result;
}

function getUserByUsername($conn, $username) {
    $sql  = "SELECT * FROM userinfo WHERE username = '$username'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    return mysqli_fetch_assoc($result);
}


public function getUserByPnum($conn, $username) {
    $sql = "SELECT pnum FROM userinfo WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

public function getUserByEmail($conn, $username) {
    $sql = "SELECT email FROM userinfo WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

public function getUserByAddress($conn, $username) {
    $sql = "SELECT address FROM userinfo WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function resetPassword($conn, $username, $newPassword)
{
   
    $sql = "UPDATE userinfo SET password = '$newPassword' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        // Password updated successfully
        return true;
    } else {
        // Error occurred while updating password
        return false;
    }
}

function verifyPassword($conn, $username, $currentPassword) {
    // Query to check if the provided username and password match
    $sql = "SELECT * FROM userinfo WHERE username = ? AND password = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("ss", $username, $currentPassword);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if there is a row with the provided username and password
    if ($result->num_rows > 0) {
        // Password verified successfully
        return true;
    } else {
        // Password verification failed
        return false;
    }
}
function deleteAccount($conn, $username, $currentPassword)
{
    // Verify the current password
    $validPassword = $this->verifyPassword($conn, $username, $currentPassword);

    if ($validPassword) {
        // Delete the account
        $sql = "DELETE FROM userinfo WHERE username = '$username'";

        if ($conn->query($sql) === TRUE) {
            // Account deleted successfully
            return true;
        } else {
            // Error occurred while deleting account
            return false;
        }
    } else {
        // Invalid password
        return false;
    }
}



function updateInformation($conn, $username, $newemail, $newpnum, $newaddress)
{
    // Construct the SQL query to update user information
    $sql = "UPDATE userinfo SET email = '$newemail', pnum = '$newpnum', address = '$newaddress' WHERE username = '$username'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Information updated successfully
        return true;
    } else {
        // Error occurred while updating information
        return false;
    }
}

function authenticate($conn, $username, $password) {
    // SQL query to fetch user with the given username and password
    $sql = "SELECT username AND password FROM userinfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true; // Authentication successful
    } else {
        return "Invalid username or password"; // Authentication failed
    }
}

function getServiceType($conn, $username)
    {
        // Query to fetch service type based on username
        $sql = "SELECT servicetype FROM userinfo WHERE username = '$username'";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Fetch the first row as an associative array
                $row = $result->fetch_assoc();
                // Return the service type
                return $row['servicetype'];
            } else {
                // No rows found for the username
                return null;
            }
        } else {
            // Query execution failed
            return null;
        }
    }

function CloseCon($conn)
    {
        $conn->close();
    }

}
?>
