<?php
require("esession.php");
$sql2="select user_id,name,email,type from user where username='{$user}'";
$result=$conn->query($sql2);
$row = $result->fetch_assoc();

$type=$row["type"];
$userid=$row["user_id"];
$name=$row["name"];
$email=$row["email"];
$type=$row["type"];
if(isset($_POST["desg"])) {
    $desg = $_POST["desg"];

    mysqli_query($conn, "update moprofile SET desig='$desg' where u_id='{$userid}'");
}

$sql3="select comment,issue from mocomment where u_id='{$userid}'";
$result1=$conn->query($sql3);
$row1 = $result1->fetch_assoc();
$comment=$row1["comment"];
$pstat=$row1["issue"];
$sql4="select * from moprofile where u_id='{$userid}'";
$result1=$conn->query($sql4);
$row2 = $result1->fetch_assoc();
$designation=$row2["desig"];
$ministryname=$row2["ministryname"];




?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Official Home</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<style>
    .user {
        display: inline-block;
        width: 50px;
        height: 50px;
        border-radius: 60%;

        object-fit: cover;}
    .fa{

        padding:20px;

        font-size:30px;
        color:white;

    }

    .fa:hover{
        color:#d5d5d5;
        text-decoration:none;
    }
    #moveright {
        float:right;
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
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">


                        <center>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img src="icon.png" class="user"></a>
                                <ul class="dropdown-menu">
                                    <?php if(isset($_SESSION['login_user']))
                                    { ?>
                                    <li><a href = "moprofile.php">Profile</a></li>
                                    <li><a href = "mologout.php">Sign Out</a></li>
                                </ul>
                                <ul class="dropdown">
                                    <center><li><?php echo $user ?></li></center>
                                </ul>
                                <?php } ?>

                            </li></center>

                    </ul>

                </div>
        </nav>
    </div>
    <div class="secondary-header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li id="first">Ministry official <img src="arrow.png" width="25" height="25">&nbsp Profile</li>
                    <li><a id="moveright" href="http://localhost/sepp/citizen/blog.php">BLOGS</a></li>

                </ul>
            </div>
        </nav>
    </div>




<div class="form-style-10">
    <a href="#hidden1" data-toggle="collapse">
        <h1>Basic Details<span></span></h1></a>
    <div id="hidden1" class="collapse">
        <form>
            <div class="section"><span>1</span>Name :<?php echo $name?></div>



        </form>
        <form>
            <div class="section"><span>2</span>Email_ID :<?php echo $email?> </div>

        </form>
        <form>
            <div class="section"><span>3</span>Ministry Name :<?php echo $ministryname?> </div>



        </form>




    </div>
</div>

<div class="form-style-10">
    <a href="#hidden2" data-toggle="collapse">
        <h1>Designation<span></span></h1></a>
    <div id="hidden2" class="collapse">
        <form>
            <div class="section"><span>1</span>Designation:<?php echo $designation?></div>



        </form>
        <form action="" method="POST">
            <div class="section"><span>2</span>Update Designation : </div>
            <div class="inner-wrap">
                <label><textarea id="subject" name="desg" placeholder="Summary about idea..." style="height:200px"></textarea></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>

            </div>
        </form>

    </div>



</div>


<div class="form-style-10">
    <a href="#hidden3" data-toggle="collapse">
        <h1>Issues Submitted<span></span></h1></a>
    <div id="hidden3" class="collapse">
        <form>
            <div class="section">Problem Statement:<?php echo $comment?></div>



        </form>
        <form>
            <div class="section">Comment:<?php echo $comment?></div>



        </form>

    </div>



</div>





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

