<?php

require ('esession.php');
if(isset($_GET["pid"])) {
    $p_id = $_GET["pid"];
    $pname=$_GET["pname"];
}

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


if(isset($_POST["ideadesc"])) {

    $ideadesc = $_POST["ideadesc"];
    $target_dir = "documents/";
    $target_file = $target_dir . $tstamp . basename($_FILES["fileToUpload"]["name"]);
    //echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    /*if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "pdf") {
        echo "Sorry, only pdf is alowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $fnamed = $tstamp . basename($_FILES["fileToUpload"]["name"]);
            $flag1 = 1;
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $target_dir1 = "videos/";
    $target_file1 = $target_dir1 . $tstamp . basename($_FILES["fileToUploadv"]["name"]);
    //echo $target_file1;
    $uploadOk1 = 1;
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check1 = getimagesize($_FILES["fileToUploadv"]["tmp_name"]);
    /*if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
    // Check if file already exists
    if (file_exists($target_file1)) {
        echo "Sorry, file already exists.";
        $uploadOk1 = 0;
    }
    // Check file size
    if ($_FILES["fileToUploadv"]["size"] > 500000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk1 = 0;
    }
    // Allow certain file formats
    if ($imageFileType1 != "mp4") {
        echo "Sorry, only mp4 files are allowed.";
        $uploadOk1 = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk1 == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUploadv"]["tmp_name"], $target_file1)) {
            $fnamev = $tstamp . basename($_FILES["fileToUploadv"]["name"]);
            echo "hi";
            //echo "The file " . basename($_FILES["fileToUploadv"]["name"]) . " has been uploaded.";

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $sql = "INSERT INTO solution (p_id,doclink,vidlink,description,uorsu_id,timestamp,status) values('$p_id','$fnamed','$fnamev','$ideadesc','$u_id','$tstamp','NOTAPPROVED')";
    if ($conn->query($sql) === TRUE) {
        $result1 = mysqli_query($conn, "select s_id from solution where p_id='$p_id' AND uorsu_id='$u_id'");
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_array($result1)) {
                $s_id = $row1["s_id"];
            }

        }
        echo "Solution Added successfully";
        header("location:ehome.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
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
                    <li id="first"><img src="arrow.png" width="25" height="25">&nbsp Add Solution</li>
                    <li id="moveright"><a href="http://localhost/sep/citizen/blog.php" >Blog</a></li>

                </ul>
            </div>
        </nav>
    </div>

    <center><h3>Problem Title:</h3></center>
    <center><h3><?php echo $pname; ?></h3></center>

<div class="form-style-10">
<h1>Propose Solution<span></span></h1>
<form action="" method="post" enctype="multipart/form-data">


    <div class="section"><span>2</span>Description</div>
    <div class="inner-wrap">
    <label> <textarea  name="ideadesc" placeholder="Summary about idea..." style="height:200px"></textarea></label>
     </div>   
    
    <div class="section"><span>3</span>Uploading</div>
    <div class="inner-wrap">
    <label for="Idea">Upload Document</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
    <label for="link">Upload video</label>
        <input type="file" name="fileToUploadv" id="fileToUploadv">
  
     </div>

    
    
    <div class="button-section">
     <input type="submit" value="Submit Idea" />
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
