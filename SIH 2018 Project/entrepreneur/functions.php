<?php
function getConnection()
{
    $servername = "localhost";
    $username = "indoshel";
    $password = "indoshel123";
    $conn = new mysqli($servername, $username, $password,"sep");
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>