<?php
require("functions.php");
$conn = getConnection();
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $usernamep = $_POST["username"];
    $passp = $_POST["pass"];
    $sql = "select * from user where username='{$usernamep}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $typep = $row["type"];


        }
    }
    $a="Blogger";
    $b="Entrepreneur";
    $c="Ministry Official";
    if($typep==$a)
    {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$a'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            header("location: http://localhost/sep/citizen/blog.php");
        } else
        {
            echo "Citizen username or password is wrong";
        }
    }
    elseif($typep==$b)
    {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$b'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            //$_SESSION['login_type'] = $typep;
            header("location: http://localhost/sep/entrepreneur/ehome.php");
        } else
        {
            echo " Entrepreneur username or password is wrong";
        }
    }
    else if($typep==$c){
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$c'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            //$_SESSION['login_type'] = $typep;
            header("location:http://localhost/sep/ministryofficial/mohome.php");
        } else
        {
            echo " Ministry Official username or password is wrong";
        }
    }
    else
    {
        echo "Type doesn't match";
    }
}

?>
<html>
<head>
    <script>
        function validateForm() {
            var x1 = document.forms["lgform"]["username"].value;
            if (x1 == "") {
                alert("Name must be filled out");
                return false;
            }
            var x2 = document.forms["lgform"]["pass"].value;
            if (x2 == "") {
                alert("password must be filled out");
                return false;
            }
        }
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Form Style 10</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="header footer tester.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .fa{
        padding:20px;
        font-size:30px;
        color:white;
    }
    .fa:hover{
        color:#d5d5d5;
        text-decoration:none;
    }
</style>
<body>
<div class="header-nightsky">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" ><img src="logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="Dodmise/opt/lampp/htdocs/sep/index.php">Home</a></li>
                                  </ul>
                <div align="center">
                    <h1>Social Entrepreneur's Network</h1>

                </div>
            </div>
    </nav>
</div>
<div class="form-style-10">
    <h1>Login<span></span></h1>
    <form name="lgform" action="" method="post"
          onsubmit="return validateForm()" method="post">
        <div class="section"><span>1</span>Username : </div>
        <div class="inner-wrap">
            <label>Enter Username <input type="text" name="username" /></label>
        </div>
        <div class="section"><span>2</span>Password : </div>
        <div class="inner-wrap">
            <label>Enter Password <input type="password" name="pass" /></label>
        </div>
        <center>
            <div class="button-section">
                <input type="submit" value="Log In" />
            </div></center>
    </form>
</div>
<footer class="container-fluid text-center">
    <div class="row">
        <div class="col-sm-6">
            <h3>Feedback</h3>
            <br>
            <h4>Our address and contact info here</h4>
        </div>
        <div class="col-sm-6">
            <h3>Connect</h3>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
    </div>
</footer>

</body>
</html>