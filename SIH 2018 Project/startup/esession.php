<?php
require ('functions.php');
$conn = getConnection();
session_start();

$user_check = $_SESSION['login_user'];
//$type_check = $_SESSION['login_type'];

$result = mysqli_query($conn, "SELECT * FROM `suregister` WHERE suname = '$user_check'");

$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);

$user = $row1['suname'];

if(!isset($_SESSION['login_user'])){
    header("location:sulogout.php");

}
?>