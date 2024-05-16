<?php

function dbConnection()
{

    $conn = mysqli_connect('localhost', 'root', '', 'db');
    return $conn;
    
}

?>
