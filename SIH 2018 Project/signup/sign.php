<?php
require("functions.php");
$conn=getConnection();
if($_SERVER["REQUEST_METHOD"]=="POST") {

    $name = $_POST["field1"];
    $uname = $_POST["field2"];
    $email = $_POST["field3"];
    $type = $_POST["type"];
    $psw = $_POST["field4"];
    $flag=1;
    $flag1=0;
    if ($type=="Ministry Official") {
        $authid = $_POST["authid"];
        $query1 = "SELECT * from auth WHERE auth_id='{$authid}'";
        $result1=$conn->query($query1);
        if ($result1->num_rows < 0) {

            echo "Invalid authentication id";
            echo "<br>";
            $flag=0;

        }
        else{
            while ($row1 = $result1->fetch_assoc()) {


                $mname=$row1["ministryname"];


            }
        }

    }

    if (isset($uname)) {
        $query = "SELECT username from user WHERE username='{$uname}'";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result)) {
            echo "username exists";

        } else {
            $flag1=1;

        }

    }
    if($flag==1 && $flag1==1) {
        $sql = "insert into user (name,username,password,email,type) values('$name','$uname','$psw','$email','$type')";

        mysqli_query($conn, $sql);
        $sql2="select user_id from user where username='{$uname}'";
        $ID=mysqli_query($conn,$sql2);
        $result=mysqli_fetch_array($ID);
        $value=$result[0];

        if($type=="Ministry Official")
        {

            $sql3="insert into moprofile(u_id,ministryname) values('$value','$mname')";
            mysqli_query($conn,$sql3);


        }
        else if($type=="Entrepreneur")
        {
            $sql4="insert into eprofile(u_id) values('$value')";
            mysqli_query($conn,$sql4);
        }
        header('Location: http://localhost/sep/login/login.php');

    }

}



mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#type").change(function () {
                if ($(this).val() == "Ministry Official") {
                    $("#authid").show();
                } else {
                    $("#authid").hide();
                }
            });
        });
    </script>
    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["myForm"]["field1"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
            var x1 = document.forms["myForm"]["field2"].value;
            if (x1 == "") {
                alert("Username must be filled out");
                return false;
            }
            var x2 = document.forms["myForm"]["field3"].value;
            if (x2 == "" ) {

                alert("Email must be filled out");
                return false;
            }
            if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(myForm.email.value))
            {
                return (true)
            }
            else
            {
                alert("You have entered an invalid email address!")
                return (false)
            }

            var x3 = document.forms["myForm"]["type"].value;
            if (x3 == "") {
                alert("Type must be filled out");
                return false;
            }
            var x4 = document.forms["myForm"]["field4"].value;
            if (x4 == "") {
                alert("Password must be filled out");
                return false;
            }
            var x5 = document.forms["myForm"]["field5"].value;
            if (x5 == "") {
                alert("Confirm password must be filled out");
                return false;
            }
            if(x4!=x5)
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
                    <li class="active"><a href="#">Home</a></li>
                                    </ul>
                <div align="center">
                    <h1>Social Entrepreneur's Network</h1>

                </div>
            </div>
    </nav>
</div>




<div class="form-style-10">
    <h1>Sign Up : <span></span></h1>
    <form action="" onsubmit="return validateForm()" method="POST" name="myForm" method="POST">
        <div class="section"><span>1</span>Name : </div>
        <div class="inner-wrap">
            <label>Enter Name <input type="text" name="field1" /></label>
        </div>

        <div class="section"><span>2</span>Username : </div>
        <div class="inner-wrap">
            <label>Enter Username <input type="text" name="field2" /></label>

        </div>

        <div class="section"><span>3</span>Email : </div>
        <div class="inner-wrap">
            <label>Enter Email <input type="email" name="field3" /></label>

        </div>

        <div class="section"><span>3</span>Account type</div>
        <div class="inner-wrap">
            <label><select  name="type" id="type">
                    <option value="">--SELECT Account Type--</option>


                    <option value="Entrepreneur">Entrepreneur</option>
                    <option value="Blogger">Blogger</option>
                    <option value="Ministry Official">Ministry Official</option>


                </select>
                <br>
                <div id="authid" style="display: none">
                    <var>Authorization Id:</var>
                    <input type="text" id="authid" name="authid" /><br>
                </div>
            </label>

        </div>

        <br>

        <div class="section"><span>5</span>Password : </div>
        <div class="inner-wrap">
            <label>Enter Password <input type="password" name="field4" /></label>

        </div>
        <div class="section"><span>6</span>Confirm Password : </div>
        <div class="inner-wrap">
            <label>Confirm Password<input type="password" name="field5" /></label>

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
