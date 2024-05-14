<?php
class model
{
    function OpenCon()
    {
        $conn = new mysqli("localhost", "root", "", "providerr"); 
        return $conn;
    }

    function adduserinfo($conn, $userinfo, $name, $username, $email, $password, $pnum, $gender, $address, $servicetype)
    {
        $sql = "INSERT INTO $userinfo (name, username, email, password, pnum, gender, address, servicetype) VALUES ('$name', '$username','$email', '$password','$pnum', '$gender','$address', '$servicetype')";
        $result = $conn->query($sql);
        return $result;
    }

    function fetchmyprofile($conn, $username)
    {
        $sql = "SELECT * FROM userinfo WHERE username = '$username'";
        $result = $conn->query($sql);
        return $result;
    }

    function getServiceType($conn, $username) {
        $sql = "SELECT servicetype FROM userinfo WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['servicetype'];
        } else {
            return null; 
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
        return true;
    } else {
        return false;
    }
}

function verifyPassword($conn, $username, $currentPassword) {
    $sql = "SELECT * FROM userinfo WHERE username = ? AND password = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $currentPassword);
 
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
function deleteAccount($conn, $username, $currentPassword)
{
    $validPassword = $this->verifyPassword($conn, $username, $currentPassword);

    if ($validPassword) {
        $sql = "DELETE FROM userinfo WHERE username = '$username'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function addWorkToUser($conn, $username, $workId) {
    $sql = "INSERT INTO user_work (username, work_id) VALUES ('$username', '$workId')";
    $result = $conn->query($sql);
    return $result;
}

function getAddedWorkForUser($conn, $username) {
    $sql = "SELECT w.workname, w.workdetails, w.price 
            FROM user_work uw
            JOIN worklist w ON uw.work_id = w.id
            WHERE uw.username = '$username'";
    $result = $conn->query($sql);
    return $result;
}

function updateInformation($conn, $username, $newemail, $newpnum, $newaddress)
{
    $sql = "UPDATE userinfo SET email = '$newemail', pnum = '$newpnum', address = '$newaddress' WHERE username = '$username'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function authenticate($conn, $username, $password) {
    $sql = "SELECT username AND password FROM userinfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true; 
    } else {
        return "Invalid username or password"; 
    }
}

function CloseCon($conn)
    {
        $conn->close();
    }

}
?>
