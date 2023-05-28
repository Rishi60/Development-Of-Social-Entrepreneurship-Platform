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


            </ul>

        </nav>
    </div>



    <center><form action="" method="POST">
         <select name="filter" id="filter" >
             <option value="">--Select--</option>
             <optgroup label="Filter">
                 <option >StartupName</option>
                 <option >StartupDomain</option>

             </optgroup>
         </select>
         <input placeholder="Search Keyword" name="type" id="type" value="" type="text">
         <button type="submit" >Search</button>

     </form>
 </center>


 <?php

require("functions.php");
$conn=getConnection();
if(isset($_POST["filter"])) {

 $filter = $_POST["filter"];
 $type = $_POST["type"];

 if ($filter == "StartupName") {
 ?>
 <center><h2>Search Result:<?php echo $filter ?></h2></center><?php
 $sql = "select * from suregister where suname='{$type}'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 // output data of each row
 while ($row = $result->fetch_assoc()) {
 $su_id = $row["su_id"];
 $sql1 = "select * from suprofile where su_id='{$su_id}'";
 $result1 = $conn->query($sql1);
 if ($result1->num_rows > 0) {
 while ($row1 = $result1->fetch_assoc()) {
 $description = $row1["description"];
 $supaccomp = $row1["supaccomp"];
 $supworkon = $row1["supworkon"];

 ?>


 <div class="form-style-10">
     <a href="#hidden1" data-toggle="collapse">
         <h1><?php echo $type ?><span></span></h1></a>
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
                         <center>Startup Description</center>
                     </th>
                     <th>
                         <center>Projects Accomplished</center>
                     </th>
                     <th>
                         <center>Projects Working On</center>
                     </th>

                 </tr>

                 <tr>
                     <td> <?php echo $description ?> </td>
                     <td>  <?php echo $supaccomp ?> </td>

                     <td><?php echo $supworkon ?></td>

                 </tr>

             </table>

         </div>

     </div>
 </div>
 <?php
 }
 }
 }
 }
 }else if($filter == "StartupDomain"){
 ?>
 <center><h2>Search Result:<?php echo $filter ?></h2></center><?php

 $sql = "select * from suregister where sudomain='{$type}'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 // output data of each row
 while ($row = $result->fetch_assoc()) {
 $su_id = $row["su_id"];
 $sql1 = "select * from suprofile where su_id='{$su_id}'";
 $result1 = $conn->query($sql1);
 if ($result1->num_rows > 0) {
 while ($row1 = $result1->fetch_assoc()) {
 $description = $row1["description"];
 $supaccomp = $row1["supaccomp"];
 $supworkon = $row1["supworkon"];

 ?>


 <div class="form-style-10">
     <a href="#hidden1" data-toggle="collapse">
         <h1><?php echo $type ?><span></span></h1></a>
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
                     <center>Startup Description</center>
                 </th>
                 <th>
                     <center>Projects Accomplished</center>
                 </th>
                 <th>
                     <center>Projects Working On</center>
                 </th>

             </tr>

             <tr>
                 <td> <?php echo $description ?> </td>
                 <td>  <?php echo $supaccomp ?> </td>

                 <td><?php echo $supworkon ?></td>

             </tr>

         </table>


     </div>
 </div>

 <?php
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
