<html>
<head>
    <?php
    require ('esession.php');
    $result1 = mysqli_query($conn,"select su_id from suregister where suname='$user'");
    $count1=$result1->num_rows;
    if($count1>0)
    {
        while ($row = mysqli_fetch_array($result1))
        {
            $su_id=$row["su_id"];
        }
    }
    else
    {
        echo "Entrepreneur Not Found";
    }
    ?>
    <title>Solutions Rejected</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    table, th, td {
        border: 1px solid black;
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
                        StartUp</a>
                    <ul class="dropdown-menu">
                        <li><a href = "susolutionsub.php">SOLUTION SUBMITTED</a></li>
                        <li><a href = "susolutionapp.php">SOLUTION APPROVED</a></li>
                        <li><a href = "susolutionrej.php">SOLUTION REJECTED</a></li>
                        <li><a href = "#">SOLUTION PENDING</a></li>
                        <li><a href = "susuggestion.php">SUGGESTIONS</a></li>

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


<center><h2>Solution Rejected :</h2></center>
<?php
$result2 = mysqli_query($conn,"SELECT * from solution where status='REJECTED' AND uorsu_id='$su_id';");
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