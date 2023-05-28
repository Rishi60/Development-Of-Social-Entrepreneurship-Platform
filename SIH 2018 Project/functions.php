<?php
function getConnection()
{
    $servername = "localhost";
    $username = "indoshel";
    $password = "indoshel123";
    $dbname = "sep";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
