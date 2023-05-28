<?php
require("functions.php");
$conn=getConnection();
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["field1"];
    $domain=$_POST["field2"];
    $pass=$_POST["field3"];
    $flag=0;
    if (isset($name)) {
        $query = "SELECT suname from suregister WHERE suname='{$name}'";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result)) {
            echo "startup name  exists";

        } else {
            $flag=1;

        }

    }
    if($flag==1) {
        mysqli_query($conn, "insert into suregister(suname,sudomain,supass)values('$name','$domain',$pass)");
        $sql3 = "select su_id from suregister where suname='{$name}'";
        $result1 = $conn->query($sql3);
        $row1 = $result1->fetch_assoc();
        $value = $row1["su_id"];
        mysqli_query($conn, "insert into suprofile (su_id) values('$value')");
        $_SESSION['login_user'] = $name;
        header("location:sulogin.php");
    }

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["myForm"]["field1"].value;
            if (x == "") {
                alert("Startup name must be filled out");
                return false;
            }
            var x1 = document.forms["myForm"]["field2"].value;
            if (x1 == "") {
                alert("Domain must be filled out");
                return false;
            }
            var x2 = document.forms["myForm"]["field3"].value;
            if (x2 == "" ) {

                alert("Password must be filled out");
                return false;
            }
            var x3 = document.forms["myForm"]["field4"].value;
            if (x3 == "" ) {

                alert(" Confirm Password Field must be filled out");
                return false;
            }
            if(x2!=x3)
            {
                alert("Your password does not match");
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
    <link rel="stylesheet" type="text/css" href="header.css">
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
                    <li class="active"><a href="http://localhost/sep/index.php">Home</a></li>
                    <li class="active"><a href="http://localhost/sep/citizen/blog.php">Blog's</a></li>

                    

                </ul>
                <div align="center">
                    <h1>Social Entrepreneur's Network</h1>

                </div>
            </div>
    </nav>
</div>




<div class="form-style-10">
    <h1>Start Up Sign Up : <span></span></h1>
    <form action="" onsubmit="return validateForm()" method="POST" name="myForm">
        <div class="section"><span>1</span>Start Up Name : </div>
        <div class="inner-wrap">
            <label>Enter Name <input type="text" name="field1" /></label>
        </div>

        <div class="section"><span>2</span>Domain : </div>
        <div class="inner-wrap">
            <label>Enter Domain <input type="text" name="field2" /></label>

        </div>

        <div class="section"><span>3</span>Password : </div>
        <div class="inner-wrap">
            <label>Enter Password <input type="password" name="field3" /></label>

        </div>



        <div class="section"><span>5</span>Confirm Password : </div>
        <div class="inner-wrap">
            <label>Enter Password <input type="password" name="field4" /></label>

        </div>


        <div class="button-section">
            <input type="submit" value="Sign Up" />

        </div>





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