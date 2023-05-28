






<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>Add Solution</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="header.css">
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
                    <li id="first"><img src="arrow.png" width="25" height="25">&nbsp Search Solution</li>
                    <li id="moveright"><a href="http://localhost/sep/citizen/blog.php" >Blog</a></li>

                </ul>
            </div>
        </nav>
    </div>




<div class="form-style-10">
    <h1>Prposal for Problem</h1></a>
    <form action="" method="POST">

    <?php

require("esession.php");
    $pname=$_GET["pname"];
    $p_id=$_GET["pid"];
$sql1="select name from user where username='{$user}'";
$result1=$conn->query($sql1);
    if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc())
        {
            $name=$row1["name"];
        }
    }
if(isset($_GET["pid"])){
$pid=$_GET["pid"];}
    if(isset($_POST["field2"]))
    {

        $id=$_POST["sid"];



        $sugg=$_POST["field2"];
        $type=$_POST['type'];

        if($type=="Investor") {
            mysqli_query($conn, "insert into suggestions(s_id,isuggestion,name) values('$id','$sugg','$name')");
        }
        else
        {
            mysqli_query($conn, "insert into suggestions(s_id,esuggestion,name) values('$id','$sugg','$name')");
        }

    }

?>
        Solutions for Problem <?php $pname; ?><br>
<table border="1" align="center" cellpadding="4" style="width:90%">
        <style>
            thead {color:black;}

        </style>

        <thead style="background-color:ivory">
        <tr>
            <th>Submitted By</th>
            <th><center>Description</center></th>
            <th><center>Document Link</center></th>
            <th><center>Video Link</center></th>
            <th><center>
                    <div class="section">Suggestions:</div></center><th>


        </tr>
<?php



        $sql = "select * from solution where p_id='{$pid}'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $solutionid = $row["s_id"];
    $u_id=$row["uorsu_id"];
    $sql1 = "select name from user where user_id='$u_id'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $name=$row1["name"];
    ?>
        <tr>
            <td> <?php echo $name; ?> </td>
            <td><?php echo $row["description"]?> </td>
            <td><a href="http://localhost/sep/entrepreneur/documents/<?php echo $row["doclink"]?>">Open Solution document</a></td>
            <td><a href="http://localhost/sep/entrepreneur/videos/<?php echo $row["vidlink"]?>">Open Video</a></td>
            <td>
                <form action="" method="POST" ><div class="inner-wrap">
                    <label>Enter details<input type="text" name="field2" /></label>
                    <input type="hidden" name="sid" value="<?php echo htmlspecialchars($solutionid); ?>">

                            <input type="radio" name="type" value="Expert"> Expert<br>
                            <input type="radio" name="type" value="Investor"> Investor<br>

                            <input type="submit" name="submit">

                    </div>
                </form>
            </td><br>
         <?php
    }
    }




?>





        </tr>

    </table>

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


