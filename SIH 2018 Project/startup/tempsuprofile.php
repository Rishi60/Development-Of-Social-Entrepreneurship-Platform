<html>
<body>
<?php
require("esession.php");
echo "*********************startup profile*****************";
echo"<br>";
?>

<form action="" method="POST">
    STARTUP DESCRIPTION: <input type="text" name="description"><br>

    <input type="submit" value="Submit">
</form>
<?php
$sql="select su_id from suregister where suname='{$name}'";
$result1=$conn->query($sql);
$row1 = $result1->fetch_assoc();
$suid=$row1["su_id"];

$sql2="select * from suprofile where su_id='{$suid}'";
$result2=$conn->query($sql2);
$row2 = $result2->fetch_assoc();
echo"<br>";



echo "DESCRIPTION<br>";
echo $row2["description"]."<br>";

if(isset($_POST["description"]))
{
    $desc=$_POST["description"];



    mysqli_query($conn,"update suprofile set description='$desc' where su_id='{$suid}'");

}
?>
<form action="" method="POST">
    PROJECTS ACCOMPLISHED: <input type="text" name="paccomp"><br>

    <input type="submit" value="Submit">
</form>
<?php
echo "PROJECTS ACCOMPLISHED<br>";
echo $row2["supaccomp"]."<br>";
if(isset($_POST["paccomp"]))
{
    $paccomp=$_POST["paccomp"];



    mysqli_query($conn,"update suprofile set supaccomp='$paccomp' where su_id='{$suid}'");

}

?>

<form action="" method="POST">
    PROJECTS WORKING ON : <input type="text" name="pworkon"><br>

    <input type="submit" value="Submit">
</form>
<?php

echo "PROJECTS COMPLETED<br>";
echo $row2["supworkon"]."<br>";

if(isset($_POST["pworkon"]))
{
    $pworkon=$_POST["pworkon"];



    mysqli_query($conn,"update suprofile set supworkon='$pworkon' where su_id='{$suid}'");

}
?>

<form action="" method="POST">
    ADD MEMBERS : <input type="text" name="members"><br>

    <input type="submit" value="Submit">
</form>
<?php

if(isset($_POST["members"]))
{
    $member=$_POST["members"];


    echo $member;
    mysqli_query($conn,"insert into member(su_id,members) values('$suid','$member')");

}
?>
</body>
</html>
