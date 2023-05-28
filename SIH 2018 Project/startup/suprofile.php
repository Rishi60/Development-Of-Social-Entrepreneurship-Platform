<?php
require("esession.php");


$sql="select * from suregister where suname='{$user}'";
$result1=$conn->query($sql);
$row1 = $result1->fetch_assoc();
$suid=$row1["su_id"];
$domain=$row1["sudomain"];
$adminid=$row1["adminid"];
$type=$row1["type"];
$sql2="select * from suprofile where su_id='{$suid}'";
$result2=$conn->query($sql2);
$row2 = $result2->fetch_assoc();





$description=$row2["description"];
$supaccomp=$row2["supaccomp"];
$supworkon=$row2["supworkon"];


$spl1 = explode(",", $domain);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["domain"]))
	{ 
              $domainc=$_POST["domain"];
               $resultc1 = mysqli_query($conn, "select sudomain from suregister where su_id='$suid'");
               if ($resultc1->num_rows > 0)
            while ($rowc1 = mysqli_fetch_array($resultc1)) {
                $domainp = $rowc1["sudomain"];
            }
            if ($domainc == "") {
            $domainn = $domainp;
        } else {
            $domainn = $domainp . $domainc . ",";
        }
        $sql = "UPDATE suregister SET sudomain='$domainn' where su_id='$suid'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Skills updated successfully</br>";
            header("location:suprofile.php");
        } else {
            echo "Error updating domain " . $sql . "<br>" . $conn->error;
        }
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["description"]))
{
    $desc=$_POST["description"];



    mysqli_query($conn,"update suprofile set description='$desc' where su_id='$suid'");

}
}

$spl2 = explode(",", $supaccomp);
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["paccomp"]))
{
    $paccompc=$_POST["paccomp"];
     $resultc1 = mysqli_query($conn, "select supaccomp from suprofile where su_id='$suid'");
     if ($resultc1->num_rows > 0)
            while ($rowc1 = mysqli_fetch_array($resultc1)) {
                $paccompp = $rowc1["supaccomp"];
            }
            if ($paccompc == "") {
            $paccompn = $paccompp;
        } else {
            $paccompn = $paccompp . $paccompc . ",";
        }
    $sql = "UPDATE suprofile SET supaccomp='$paccompn' where su_id='$suid'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Skills updated successfully</br>";
            header("location:suprofile.php");
        } else {
            echo "Error updating projects " . $sql . "<br>" . $conn->error;
        }
	}
    

}


$spl3 = explode(",", $supworkon);
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["pworkon"]))
{
    $pworkonc=$_POST["pworkon"];
    $resultc1 = mysqli_query($conn, "select supworkon from suprofile where su_id='$suid'");
   if ($resultc1->num_rows > 0)
            while ($rowc1 = mysqli_fetch_array($resultc1)) {
                $pworkonp = $rowc1["supworkon"];
            }
         if ($pworkonc == "") {
            $pworkonn = $pworkonp;
        } else {
            $pworkonn = $pworkonp . $pworkonc . ",";
        }
$sql = "UPDATE suprofile SET supworkon='$pworkonn' where su_id='$suid'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Skills updated successfully</br>";
            header("location:suprofile.php");
        } else {
            echo "Error updating projects " . $sql . "<br>" . $conn->error;
        }
	}

   
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["members"]))
{
    $member=$_POST["members"];
    $sql="select * from user where name='{$member}'";
    $result1=$conn->query($sql);
    $row1 = $result1->fetch_assoc();
    $uid=$row1["user_id"];
    $sql="insert into suinvitation values('$suid','$adminid','$uid','$type','Pending')";
    if($conn->query($sql)===True)
    {
        echo "<br>Invitation sent</br>";
        header("location:suprofile.php");
    } else {
        echo "<br>Error sending invitation</br> ";
    }

}
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Form Style 10</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="form.css">
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





<div class="form-style-10">
    <h1>Start Up Profile : <span></span></h1>
    
        <div class="section"><span>1</span>Name :<?php echo $user;?> </div>
        
        <form action="" method="post">
        <div class="section"><span>2</span>Domain :<?php foreach($spl1 as $v1)
              {
                    echo $v1."<br>";
              }?> </div>
        <div class="inner-wrap">
            <label>Your Domain name <input type="text" name="domain" /></label>
             <div class="button-section">
     <input type="submit" value="Save" />
     
         </div>

        </div>
         </form>

        <form action="" method="post">
        <div class="section"><span>3</span>Description :<?php echo $description;?> </div>
        <div class="inner-wrap">
            <label>Summary about idea <textarea id="subject" name="description" style="height:200px"></textarea></label>
             <div class="button-section">
     <input type="submit" value="Save" />
     
         </div>
        </div>
        </form>

         <form action="" method="post">
        <div class="section"><span>4</span>Add Member :<?php $sql3="select members from member where su_id='{$suid}'";
$result3=$conn->query($sql3);

if ($result3->num_rows > 0){
while ($row3 = $result3->fetch_assoc()){
echo $row3["members"]."<br>";
}
}?>
				 
				</div>
        <div class="inner-wrap">
            <label>Enter Name <input type="text" name="members" /></label>

            <div class="button-section">
                <input type="submit" value="Add" />

            </div>
        </div>
        </form>



         <form action="" method="post">
        <div class="section"><span>5</span>Project working on:<?php foreach($spl3 as $v3)
              {
                    echo $v3."<br>";
              }?> </div>
        <div class="inner-wrap">
            <label>Short summary <input type="text" name="pworkon" /></label>
             <div class="button-section">
     <input type="submit" value="Save" />
     
         </div>
        </div>
        </form>

         <form action="" method="post">
        <div class="section"><span>6</span>Project Accomplished:<?php foreach($spl2 as $v2)
              {
                    echo $v2."<br>";
              }?> </div>
        <div class="inner-wrap">
            <label>Short summary <input type="text" name="paccomp" /></label>
              <div class="button-section">
     <input type="submit" value="Save" />
     
         </div>
        </div>
        </form>

        





    
</div>







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
