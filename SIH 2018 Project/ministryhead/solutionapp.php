<html>
<head>
    <?php
    require ('session.php');
    $user = $row1['musername'];
    //echo $user;
    $result = mysqli_query($conn,"select ministryname from mhprofile where musername='$user'");
    $count=$result->num_rows;
    if($count>0)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $mininame=$row["ministryname"];
        }
    }
    else
    {
        echo "Ministry Not Found";
    }
    ?>
    <title>Solution</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Add Problem</title>
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

        object-fit: cover;
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
                                    <li><a href = "logoutmh.php">Sign Out</a></li>
                                </ul>
                                <ul class="dropdown">
                                    <li><?php echo $user ?></li>
                                </ul>
                                <?php } ?>

                            </li></center>
                    </ul>
                </div>
        </nav>
    </div>

    <div class="secondary-header">
        <nav class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li id="first">Ministry-Head <img src="arrow.png" width="25" height="25">&nbsp Solution Approved</li>
                    <li class="nav navbar-nav navbar-right"><a href="http://localhost/sep/citizen/blog.php">Blogs</a></li>

                </ul>

        </nav>
    </div>


<h2>Solution approved :</h2>
    <?php
    $result2 = mysqli_query($conn,"select * from solution inner join problem on solution.p_id=problem.p_id where ministryname='$mininame' AND status='APPROVED';");
    $count2=$result2->num_rows;
    if($count2>0)
    {
        while ($row = mysqli_fetch_array($result2))
        {
            $s_id = $row["s_id"];
            $p_id = $row["p_id"];
            $u_id =$row["uorsu_id"];
            $vidlink = $row["vidlink"];
            $doclink = $row["doclink"];
            $description = $row["description"];
            $timestamp = $row["timestamp"];
            $linkd = "http://localhost/sep/entrepreneur/documents/" . $doclink;
            $linkv = "http://localhost/sep/entrepreneur/videos/" . $vidlink;
            $remark = $row["remarks"];

            $result2 = mysqli_query($conn,"select pname from problem where p_id='$p_id' ;");
            $count2=$result2->num_rows;
            $row2 = mysqli_fetch_array($result2);
            $pname=$row2["pname"];
            //echo $u_id[0];
            if($u_id[0]=='U')
            {
                $result3 = mysqli_query($conn, "select name from user where user_id='$u_id';");
                $count3 = $result3->num_rows;
                if($count3>0)
                {
                    while ($row3 = mysqli_fetch_array($result3)) {
                        $name = $row3["name"];
                    }
                }
            }
            else if($u_id[0]=='S')
            {
                $result4 = mysqli_query($conn, "select suname from suregister where su_id='$u_id';");
                $count4 = $result4->num_rows;
                $row4 = mysqli_fetch_array($result4);
                while($row4 = mysqli_fetch_array($result4))
                {
                    $name = $row4["suname"];
                }
            }
            //echo $name;
            ?>

            <button class="accordion"><pre><b><font face="verdana" size="3"><img src="solution.jpg" width="50" height="37">  Problem Title:-  <?php echo $pname."        BY   ".$name;?></font></b></pre></button>
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