<!DOCTYPE HTML>
<?php
require ('functions.php');
$conn = getConnection();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $mhusernamep = $_POST["mhusername"];
    $mhpassp = $_POST["mhpass"];
    $result = mysqli_query($conn, "SELECT * FROM `mhprofile` WHERE musername = '$mhusernamep' AND pass='$mhpassp'");
    $count = $result->num_rows;
    if ($count == 1) {
        //session_register("mhusernamep");
        $_SESSION['login_user'] = $mhusernamep;
        header("location: mhhome.php");
    } else
    {
        echo "username or password is wrong";
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Ministry Login</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var x1 = document.forms["mhform"]["mhusername"].value;
            if (x1 == "") {
                alert("Name must be filled out");
                return false;
            }
            var x2 = document.forms["mhform"]["mhpass"].value;
            if (x2 == "") {
                alert("password must be filled out");
                return false;
            }
        }
    </script>


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

<div class="allButFooter">
    <div class="header-nightsky">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" ><img src="logo.png"></a>
                </div>
        </nav>
    </div>




    <div class="form-style-10">
        <h1>Minisrty Login<span></span></h1>
        <form name="mhform" action="" method="post"
              onsubmit="return validateForm()" method="post">
            <div class="section"><span>1</span>Username : </div>
            <div class="inner-wrap">
                <label>Enter Username <input type="text" name="mhusername" /></label>
            </div>

            <div class="section"><span>2</span>Password : </div>
            <div class="inner-wrap">
                <label>Enter Password <input type="password" name="mhpass" /></label>

            </div>
            <center>
                <div class="button-section">
                    <input type="submit" value="Log In" />

                </div></center>





        </form>
    </div>
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
