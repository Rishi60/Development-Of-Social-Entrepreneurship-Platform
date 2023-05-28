



<html>
<head>
    <title>Solution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="form.css">
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
                    <li class="active"><a href="http://localhost/sep/index.php">Home</a></li>
                    <li class="active"><a href="http://localhost/sep/citizen/blog.php">Blog's</a></li>
                                   </ul>
                <div align="center">
                    <h1>Social Entrepreneur's Network</h1>

                </div>
            </div>
        </div>
    </nav>
</div>


<?php
require("functions.php");
$conn=getConnection();

if (isset($_POST["filter"])) {
    $filter = $_POST["filter"];

    $type = $_POST["type"];
    if ($filter == "Ministry") {

         ?><center><h2>Search Result:<?php echo $filter ?> </h2></center><?php

        $i=1;
        $result = mysqli_query($conn,"select * from problem  where ministryname='$type' ");
        $count=$result->num_rows;
        if($count>0)
        {
            while ($row = mysqli_fetch_array($result))
            {

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

                            <div align="center"><button type="submit"><a href="addsolution.php?pid=<?php echo $p_id; ?>&pname=">Submit Proposal</a></button></div>


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
    }

    if ($filter == "Domain") {
        ?> <center><h2>Search Result:<?php echo $filter ?></h2></center><?php
        $sql = "select * from problem where domain='{$type}'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
// output data of each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row["p_id"];
                $pstat = $row["pstatement"];
                $pname = $row["pname"];


                ?>



                <div class="form-style-10">
                    <a href="#hidden1" data-toggle="collapse">
                        <h1><?php echo $pname ?><span></span></h1></a>
                    <div id="hidden1" class="collapse">

                        <table border="1" align="center" cellpadding="4" style="width:90%">
                            <style>
                                thead {
                                    color: black;
                                }

                            </style>

                            <thead style="background-color:ivory">
                            <tr>

                                <th>
                                    <center>Problem ID</center>
                                </th>

                                <th>
                                    <center>Description</center>
                                </th>

                            </tr>

                            <tr>


                                <td><?php echo $pid ?></td>

                                <td><?php echo $pstat ?> </td>

                            </tr>

                        </table>


                    </div>
                </div>
                <?php
            }
        }
    }


    if ($filter == "Entrepreneur") {
         ?><center><h2>Search Result:<?php echo $filter ?></h2></center><?php

$sql = "select user_id,name,username from user where name='{$type}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $userid = $row["user_id"];
                $username = $row["username"];
                $sql2 = "select * from eprofile where u_id='{$userid}'";
                $result1 = $conn->query($sql2);
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $skills = $row1["skills"];
                        $wexp = $row1["workingexp"];
                        $paccomp = $row1["paccomp"];
                        $pworkon = $row1["pworkon"];
                        $spec = $row1["specialization"];
                        ?>


                        <div class="form-style-10">
                            <a href="#hidden1" data-toggle="collapse">
                                <h1><?php echo $username ?><span></span></h1></a>
                            <div id="hidden1" class="collapse">
                                <div class="con">
                                <table class="responsive-table">
                                    <style>
                                        thead {
                                            color: black;
                                        }

                                    </style>

                                    <thead style="background-color:ivory">
                                    <tr>

                                        <th>
                                            <center>Skills</center>
                                        </th>

                                        <th>
                                            <center>Working Experience</center>
                                        </th>
                                        <th>
                                            <center>Projects Accomplished</center>
                                        </th>
                                        <th>
                                            <center>Projects Working On</center>
                                        </th>
                                        <th>
                                            <center>Specialization</center>
                                        </th>

                                    </tr>

                                    <tr>


                                        <td><?php echo $skills ?></td>

                                        <td><?php echo $wexp ?> </td>
                                        <td><?php echo $paccomp ?></td>

                                        <td><?php echo $pworkon ?></td>

                                        <td><?php echo $spec ?></td>


                                    </tr>

                                </table>


                            </div>
                            </div>
                        </div>
                        <?
                    }
                }
            }
        }
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
</div>

</body>
</html>


