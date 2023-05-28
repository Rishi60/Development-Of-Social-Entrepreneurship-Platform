<html>
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
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>Add Solution</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="header footer tester.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style type="text/css">


        .user {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 60%;}
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
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

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
                    <li id="first"><img src="arrow.png" width="25" height="25">&nbsp Suggestion</li>
                    <li id="moveright"><a href="http://localhost/sep/citizen/blog.php" >Blog</a></li>

                </ul>
            </div>
        </nav>
    </div>
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

   <h3>Suggestions</h3>
</body>

    <?php
    $flag1=0;
    $flag2=0;
    $results = mysqli_query($conn,"select suggestions.s_id,suggestions.esuggestion,suggestions.isuggestion,suggestions.name from suggestions inner join solution on solution.s_id=suggestions.s_id where solution.uorsu_id='$u_id'");
    $counts=$results->num_rows;
    if($counts>0)
    {
        while ($row = mysqli_fetch_array($results)) {
            $s_id=$row["s_id"];
            $esugg=$row["esuggestion"];
            if($esugg=="")
            {$flag1=1;}
            $isugg=$row["isuggestion"];
            if($isugg=="")
            {$flag2=1;}
            $ename=$row["name"];

            $result2 = mysqli_query($conn,"select pname from problem inner join solution on problem.p_id=solution.p_id where s_id='$s_id'; ;");
            $count2=$result2->num_rows;
            $row2 = mysqli_fetch_array($result2);
            $pname=$row2["pname"];
            ?>
            <button class="accordion"><pre><b><font face="verdana" size="3"><img src="suggestion.jpg" width="50" height="50">    Suggestion for Solution ID  <?php echo $s_id."        For problem   ".$pname;?></font></b></pre></button>
            <div class="panel">
                <p> <?php echo "Suggestion by:-   ".$ename;?> </p><br>
                <p> <?php if($flag1==1){echo "Investor Suggestion:-   ".$isugg;}?> </p><br>
                <p> <?php if($flag2==1){echo "Expert Suggestion:-   ".$esugg;}?> </p><br>
            </div>
            <?php
        }
    }
    else
    {
        echo "Suggestions Not found";
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

