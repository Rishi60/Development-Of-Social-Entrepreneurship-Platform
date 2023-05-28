<html>
<?php
require ('esession.php');
$result1 = mysqli_query($conn,"select su_id from user where suname='$user'");
$count1=$result1->num_rows;
if($count1>0)
{
    while ($row = mysqli_fetch_array($result1))
    {
        $su_id=$row["su_id"];
    }
}
?>

<head>
    <title>Entrepreneur page after login</title>
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
<center><h3>Suggestions</h3></center>
</body>

<?php
$flag1=0;
$flag2=0;
$results = mysqli_query($conn,"select suggestions.s_id,suggestions.esuggestion,suggestions.isuggestion,suggestions.name from suggestions inner join solution on solution.s_id=suggestions.s_id where solution.uorsu_id='$su_id'");
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

