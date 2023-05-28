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


/*
function redirect($where)
{
    header("location:$where");
}
if($type=="Entrepreneur")
{
    redirect('http://localhost/indoshel/entrepreneur.php');
}
else if($type=="Blogger")
{
    redirect('http://localhost/indoshel/blogger.php');
}
else if($type=="Ministry Official")
{
    redirect('http://localhost/indoshel/ministryofficial.php');
}

*/
 ?>

<!--
    <script type="text/javascript">
    var type=document.getElementById("viewtype");
    if(var=="entrepreneur")
    {
        window.location="http://localhost/indoshel/entrepreneur.php";
    }
</script>
-->
