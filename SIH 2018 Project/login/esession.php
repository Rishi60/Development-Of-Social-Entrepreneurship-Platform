<?php
require ('functions.php');
$conn = getConnection();
session_start();

$user_check = $_SESSION['login_user'];
//$type_check = $_SESSION['login_type'];

$result = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$user_check'");

$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);

$user = $row1['username'];

if(isset($_SESSION['login_user'])){
    echo "<br>logged in as  ".$user."</br>";
}
else{
    header("location:mologout.php");
}
?>