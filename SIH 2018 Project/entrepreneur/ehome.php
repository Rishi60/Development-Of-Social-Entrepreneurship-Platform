<html>
<head>


    <?php
    require ('esession.php');
    ?>
    <title>Entrepreneur page after login</title>
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

    #dsds {
        position: relative;
        z-index: 1;
    }

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
        margin-left:520px;
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
                    <li><a href="http://localhost/sep/citizen/blog.php">Blog</a></li>

                    <li class="nav navbar-nav navbar-right">
                        <form action="http://localhost/sep/search/searchresult.php" method="POST">
                            <input placeholder="Search Keyword" name="type" id="type" value="" type="text">
                            <select name="filter" id="filter" >
                                <option value="">--Select--</option>
                                <optgroup label="Filter">
                                    <option >Ministry</option>
                                    <option >Domain</option>
                                    <option >Entrepreneur</option>

                                </optgroup>
                            </select>
                            <button type="submit" >Search</button>
                        </form>

                    </li>

                </ul>

        </nav>
    </div>

    <h2><em>Problem Statements :</em></h2>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <?php
    $result1 = mysqli_query($conn,"select user_id from user where username='$user'");
    $count1=$result1->num_rows;
    if($count1>0)
    {
        while ($row = mysqli_fetch_array($result1))
        {
            $u_id=$row["user_id"];
        }
    }
    $a=date("Y-m-d");
    $b=date("h:i:sa");
    $tstamp=$a.$b;
    //echo $tstamp;
    $i=1;
    $result = mysqli_query($conn,"select * from problem");
    $count=$result->num_rows;
    if($count>0)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $p_id=$row["p_id"];
            $pname=$row["pname"];
            ?>

            <div>

                <!-- Blog Post -->
                <div id="border">
                    <div>
                        <h2 class="card-title"><img src="problem.jpg" width="30" height="30"><?php echo "   ".$row["pname"];?> <br>     <font size=5px;> <?php echo "By:-  ".$row["ministryname"];?></font></h2>
                        <p class="card-text">
                            <a href="#hidden<?php echo $i;?>" class="btn btn-primary" data-toggle="collapse"><img src="downarrow.png" height="30" width="30"></a>
                            <div id="hidden<?php echo $i;?>" class="collapse">
                        <p style="text-align:justify">
                            <?php echo "Uploaded On:- ".$row["adddate"];?><br>
                            <?php echo "Description:-  ".$row["pstatement"];?></p>

                        <div align="center"><button type="submit"><a href="addsolution.php?pid=<?php echo $p_id; ?>&pname=">Participate</a></button></div>


                        <div align="center"><button type="submit"><a href="http://localhost/sep/search/search.php?pid=<?php echo $p_id; ?> ">Suggestion</a></button></div>

                    </div>

                </div>

            </div>
            <?php
            $i=$i+1;
        }
    }
    else
    {
        echo "No problems to display";
    }
    ?>


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
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    </body>
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

