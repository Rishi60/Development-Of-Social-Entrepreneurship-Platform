<html>
<head>
    <?php
    require ('esession.php');
    $result1 = mysqli_query($conn,"select user_id from user where username='$user'");
    $count1=$result1->num_rows;
    if($count1>0)
    {
        while ($row = mysqli_fetch_array($result1))
        {
            $u_id=$row["user_id"];
        }
    }
    else
    {
        echo "Entrepreneur Not Found";
    }
    ?>
    <title>Solutions Approved</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>

    #border{
        background-color: lightgrey;
        width: 90%;
        border: 1px black;
        padding: 25px;
        margin: 25px;
    }

    #lol {

        margin-left: 10px;
        font-size: 25px;
        font-family: "Century Gothic";

    }
    .user {
        display: inline-block;
        width: 50px;
        height: 50px;
        border-radius: 60%;}

    object-fit: cover;
    }
    .myButton {
        background-color:#44c767;
        -moz-border-radius:42px;
        -webkit-border-radius:42px;
        border-radius:42px;
        border:1px solid #18ab29;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:17px;
        font-weight:bold;
        padding:11px 12px;
        text-decoration:none;
    }
    .myButton:hover {
        background-color:#5cbf2a;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }

    .myButton1 {
        background-color:#ff4c4c;
        -moz-border-radius:42px;
        -webkit-border-radius:42px;
        border-radius:42px;
        border:1px solid #91181e;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:17px;
        font-weight:bold;
        padding:11px 12px;
        text-decoration:none;
    }
    .myButton1:hover {
        background-color:#bd2a2a;
    }
    .myButton1:active {
        position:relative;
        top:1px;
    }

    .myButton2 {
        background-color:#4c9dff;
        -moz-border-radius:42px;
        -webkit-border-radius:42px;
        border-radius:42px;
        border:1px solid #18658f;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:17px;
        font-weight:bold;
        padding:11px 12px;
        text-decoration:none;
    }
    .myButton2:hover {
        background-color:#2c91bd;
    }
    .myButton2:active {
        position:relative;
        top:1px;
    }



    .fa{
        padding:20px;
        font-size:30px;
        color:white;

    }

    .fa:hover{
        color:#d5d5d5;
        text-decoration:none;
    }

    input
    {
        margin-top:7px;
        margin-left:600px; !important;
        border:none;
        font-size:20px;


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

                        <center><li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img src="icon.png" class="user"></a>
                                <ul class="dropdown-menu">
                                    <?php if(isset($_SESSION['login_user']))
                                    { ?>
                                    <li><a href = "eprofile.php">Profile</a></li>

                                    <li><a href = "http://localhost/sep/startup/sulogin.php">StartUp Login </a></li>
                                    <li><a href = "http://localhost/sep/startup/suregister.php">Register StartUp </a></li>
                                    <li><a href = "elogout.php">Sign Out</a></li>
                                </ul>
                                <ul class="dropdown">
                                    <center><li><?php echo $user ?></li></center>
                                </ul>
                                <?php } ?>

                            </li></center>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="secondary-header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" class="active" data-toggle="dropdown" href="#">
                            Entrepreneur</a>
                        <ul class="dropdown-menu">

                            <li><a href = "esolutionsub.php">SOLUTION SUBMITTED</a></li>
                            <li><a href = "esolutionapp.php">SOLUTION APPROVED</a></li>
                            <li><a href = "esolutionrej.php">SOLUTION REJECTED</a></li>
                            <li><a href = "#">SOLUTION PENDING</a></li>
                            <li><a href = "suggestion.php">SUGGESTIONS</a></li>

                        </ul>



                    </li>
                    <li id="first"><img src="arrow.png" width="25" height="25">&nbsp Solution Approved</li>
                    <li><a href="http://localhost/sep/citizen/blog.php">Blog</a></li>

                </ul>
            </div>
        </nav>
    </div>




    <h2>Solution Approved :</h2>
    <?php
    $result2 = mysqli_query($conn,"SELECT * from solution where status='APPROVED' AND uorsu_id='$u_id';");
    $count2=$result2->num_rows;
    if($count2>0)
    {
        while ($row = mysqli_fetch_array($result2)) {
            $s_id = $row["s_id"];
            $p_id = $row["p_id"];
            $vidlink = $row["vidlink"];
            $doclink = $row["doclink"];
            $description = $row["description"];
            $timestamp = $row["timestamp"];
            $linkd = "http://localhost/sep/entrepreneur/documents/" . $doclink;
            $linkv = "http://localhost/sep/entrepreneur/videos/" . $vidlink;
            $remark = $row["remarks"];

            $result2c = mysqli_query($conn,"select pname from problem where p_id='$p_id' ;");
            $count2c=$result2c->num_rows;
            $row2c = mysqli_fetch_array($result2c);
            $pname=$row2c["pname"];
            ?>
            <button class="accordion"><pre><b><font face="verdana" size="3"><img src="solution.jpg" width="50" height="37">  Solution ID  <?php echo $s_id."        For   ".$pname;?></font></b></pre></button>
            <div class="panel">
                <p> <?php echo $remark;?> </p>
                <p> <?php echo $description;?> </p>
                <p> <a href="<?php echo $linkd; ?>" target="_blank">Open solution Document </a> </p>
                <p> <a href="<?php echo $linkv; ?>" target="_blank">Open Media file </a> </p>
                <p> <?php echo $timestamp;?> </p>
            </div>

            <?php
        }
    }
    else
    {
        echo "Solutions Not Found";
    }?>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
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
</div>

</body>
</html>