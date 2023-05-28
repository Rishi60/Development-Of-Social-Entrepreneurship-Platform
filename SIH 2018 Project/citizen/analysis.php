<html>
<?php
require ('functions.php');
$conn = getConnection();
session_start();

$user_check = $_SESSION['login_user'];

$result = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$user_check'");

$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);

$user = $row1['username'];
if(!isset($_SESSION['login_user']))
{
    header("location:logoutblg.php");
}

?>
<head>

    <title>blogpage</title>
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
    #border{
        background-color: lightgrey;
        width: 100%;
        border: 1px black;
        padding: 25px;
        margin: 25px;
    }
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
                                    div  </ul>
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
            <div class="container-fluid">

                <ul class="nav navbar-nav">
                    <li id="first"></li>
                    <li>

                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input placeholder="Search Keyword" id="search_text" name="search_text" type="text">
                        <div id="result"></div>

                    </li>

                </ul>

            </div>
        </nav>
    </div>
    <center>
        <div>
        <span style="margin-right: 5px;"><a href="create.php">New Blogs</a></span>|
        <span style="margin:0 5px;"><a href="analysis.php">Blogs Analysis</a></span>|
        <span style="margin-right: 5px;"><a href="blog.php">Blogs List</a></span>
    </div>
    <div><h3>Blog Analysis</h3></div>
    </center>

    <center>
        <table border="1">
            <tr>
                <th>Social Topic</th>
                <th>No. of blogs</th>
            </tr>
    <?php
    $result1 = mysqli_query($conn,"select count(b_id),socialtopic from blog group by socialtopic");
    $count1=$result1->num_rows;
    if($count1>0)
    {
        while ($row = mysqli_fetch_array($result1))
        {
            echo "<tr>";
            echo "<td>".$row["socialtopic"]."</td>";
            echo "<td>".$row["count(b_id)"]."</td>";
            echo "</tr>";
        }
    }?>
        </table>
    </center>

    <?php
    $result2 = mysqli_query($conn,"select summary from blog");
    $count2=$result2->num_rows;
    if($count2>0)
    {
        while ($row = mysqli_fetch_array($result2))
        {

        }
    }
    ?>





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

