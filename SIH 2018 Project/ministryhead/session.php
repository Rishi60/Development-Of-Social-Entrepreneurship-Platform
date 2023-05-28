<?php
require ('functions.php');
$conn = getConnection();
session_start();

$user_check = $_SESSION['login_user'];

$result = mysqli_query($conn, "SELECT * FROM `mhprofile` WHERE musername = '$user_check'");

$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);

$user = $row1['musername'];

if(!isset($_SESSION['login_user'])){
    header("location:loginmh.php");
}
?>