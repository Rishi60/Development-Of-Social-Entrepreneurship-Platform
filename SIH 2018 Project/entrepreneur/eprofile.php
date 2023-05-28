<!DOCTYPE HTML>
<?php
require ('esession.php');
$user = $row1['username'];
?>
<br>
<?php
$result = mysqli_query($conn,"select * from user where username='$user'");
$count=$result->num_rows;
if($count>0)
{
    while ($row = mysqli_fetch_array($result))
    {
        $name = $row["name"];
        $email = $row["email"];
        $u_id= $row['user_id'];
    }
}
//echo "<br>  Name:-".$name."</br>";
//echo "<br>  Email:-".$email."</br>";
//echo "<br>  USER ID:-".$u_id."</br>";
$result1 = mysqli_query($conn,"select * from eprofile where u_id='$u_id'");
$count1=$result->num_rows;
if($count1>0)
{
    while ($row1 = mysqli_fetch_array($result1))
    {
        $skill = $row1["skills"];
        $paccomp = $row1["paccomp"];
        $wexp    = $row["workingexp"];
        $workon= $row1['pworkon'];
        $specialization= $row1['specialization'];
        $domain= $row1['domains'];
        $peval= $row1['peval'];
        $pfunded= $row1['pfunded'];
        $topicofint= $row1['topicofint'];
    }
}
//echo "***********************************ENTREPRENEUR**********************************";
//echo "<br>  SKILL:-</br>";
$spl1 = explode(",", $skill);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["skill"]))
    {
        $skillc = $_POST["skill"];

        //echo $skillc;
        $resultc1 = mysqli_query($conn, "select skills from eprofile where u_id='$u_id'");
        if ($resultc1->num_rows > 0)
            while ($rowc1 = mysqli_fetch_array($resultc1)) {
                $skillp = $rowc1["skills"];
            }
        if ($skillc == "") {
            $skilln = $skillp;
        } else {
            $skilln = $skillp . $skillc . ",";
        }
        $sql = "UPDATE eprofile SET skills='$skilln' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Skills updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating skills " . $sql . "<br>" . $conn->error;
        }
    }
}
//----------------------------------------------------------------------------------
$spl9 = explode(",", $wexp);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["wexp"]))
    {
        $wexpc = $_POST["wexp"];
        $resultc9 = mysqli_query($conn, "select workingexp from eprofile where u_id='$u_id'");
        if ($resultc9->num_rows > 0)
            while ($rowc9 = mysqli_fetch_array($resultc9)) {
                $wexpp = $rowc9["workingexp"];
            }
        if ($wexpc == "") {
            $wexpn = $wexpp;
        } else {
            $wexpn = $wexpp . $wexpc . ",";
        }
        $sql = "UPDATE eprofile SET workingexp='$wexpn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Skills updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating skills " . $sql . "<br>" . $conn->error;
        }
    }
}

//echo "<br>  Project worked:-</br>";
$spl2 = explode(",", $paccomp);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["praccomp"]))
    {
        $paccompc = $_POST["praccomp"];
        //echo $skillc;
        $resultc2 = mysqli_query($conn, "select paccomp from eprofile where u_id='$u_id'");
        if ($resultc2->num_rows > 0)
            while ($rowc2 = mysqli_fetch_array($resultc2)) {
                $paccompp = $rowc2["paccomp"];
            }
        if ($paccompc == "") {
            $paccompn = $paccompp;
        } else {
            $paccompn = $paccompp . $paccompc . ",";
        }

        $sql = "UPDATE eprofile SET paccomp='$paccompn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Projects updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating skills " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------

?>

<?php
//echo "<br>  Projects Working on:-".$workon."</br>";
$spl3 = explode(",", $workon);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["prcon"]))
    {
        $prconc = $_POST["prcon"];
        //echo $skillc;
        $resultc3 = mysqli_query($conn, "select pworkon from eprofile where u_id='$u_id'");
        if ($resultc3->num_rows > 0)
            while ($rowc3 = mysqli_fetch_array($resultc3)) {
                $prconp = $rowc3["pworkon"];
            }
        if ($prconc == "") {
            $prconn = $prconp;
        } else {
            $prconn = $prconp . $prconc . ",";
        }

        $sql = "UPDATE eprofile SET pworkon='$prconn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Projects updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating skills " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------


//-------------------------------------------------------------------------------------
//echo "<br>  Specialization:-".$specialization."</br>";
$spl4 = explode(",", $specialization);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["special"]))
    {
        $specialc = $_POST["special"];
        //echo $skillc;
        $resultc4 = mysqli_query($conn, "select specialization from eprofile where u_id='$u_id'");
        if ($resultc4->num_rows > 0)
            while ($rowc4 = mysqli_fetch_array($resultc4)) {
                $specialp = $rowc4["specialization"];
            }
        if ($specialc == "") {
            $specialn = $specialp;
        } else {
            $specialn = $specialp.$specialc . ",";
        }

        $sql = "UPDATE eprofile SET specialization='$specialn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Specialization added successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating specialization " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------
//echo "***********************************EXPERT**********************************";
//echo "<br>  Domain of expertise:-".$domain."</br>";
$spl5 = explode(",", $domain);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["domain"]))
    {
        $domainc = $_POST["domain"];
        //echo $skillc;
        $resultc5 = mysqli_query($conn, "select domains from eprofile where u_id='$u_id'");
        if ($resultc5->num_rows > 0)
            while ($rowc5 = mysqli_fetch_array($resultc5)) {
                $domainp = $rowc5["domains"];
            }
        if ($domainc == "") {
            $domainn = $domainp;
        } else {
            $domainn = $domainp . $domainc . ",";
        }

        $sql = "UPDATE eprofile SET domains='$domainn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Domain updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating domain " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------

//echo "<br>  Projects evaluated:-".$peval."</br>";
$spl6 = explode(",", $peval);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["peval"]))
    {
        $evalc = $_POST["peval"];
        //echo $skillc;
        $resultc6 = mysqli_query($conn, "select peval from eprofile where u_id='$u_id'");
        if ($resultc6->num_rows > 0)
            while ($rowc6 = mysqli_fetch_array($resultc5)) {
                $evalp = $rowc6["peval"];
            }
        if ($evalc == "") {
            $evaln = $evalp;
        } else {
            $evaln = $evalp . $evalc . ",";
        }

        $sql = "UPDATE eprofile SET peval='$evaln' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Evaluated projects updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating projects evaluated " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------





//echo "***********************************INVESTOR**********************************";
//echo "<br>  Topic of interest:-".$topicofint."</br>";
$spl7 = explode(",", $topicofint);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["topicofint"]))
    {
        $topicc = $_POST["topicofint"];
        //echo $skillc;
        $resultc7 = mysqli_query($conn, "select topicofint from eprofile where u_id='$u_id'");
        if ($resultc7->num_rows > 0)
            while ($rowc7 = mysqli_fetch_array($resultc7)) {
                $topicp = $rowc7["topicofint"];
            }
        if ($topicc == "") {
            $topicn = $topicp;
        } else {
            $topicn = $topicp . $topicc . ",";
        }

        $sql = "UPDATE eprofile SET topicofint='$topicn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Topics updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating topics " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------

//echo "<br>  Projects Funded:-".$pfunded."</br>";
$spl8 = explode(",", $pfunded);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["funded"]))
    {
        $fundedc = $_POST["funded"];
        //echo $skillc;
        $resultc8 = mysqli_query($conn, "select pfunded from eprofile where u_id='$u_id'");
        if ($resultc8->num_rows > 0)
            while ($rowc8 = mysqli_fetch_array($resultc8)) {
                $fundedp = $rowc8["pfunded"];
            }
        if ($fundedc == "") {
            $fundedn = $fundedp;
        } else {
            $fundedn = $fundedp . $fundedc . ",";
        }

        $sql = "UPDATE eprofile SET pfunded='$fundedn' where u_id='$u_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Funded Projects updated successfully</br>";
            header("location:eprofile.php");
        } else {
            echo "Error updating topics " . $sql . "<br>" . $conn->error;
        }
    }
}
//-------------------------------------------------------------------------------------

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Profile Entrepreneur</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="header footer tester.css">
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


<div class="header-nightsky">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" ><img src="logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="http://localhost/sep/index.php">Home</a></li>
                    <li class="active"><a href="ehome.php">My Home</a></li>
                    <li class="active"><a href="http://localhost/sep/citizen/blog.php">Blog's</a></li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            StartUp
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/sep/startup/suregister.php?id=<?php echo $u_id;?>&type=<?php echo "S-E";?>">Create Startup</a></li>
                            <li><a href="http://localhost/sep/startup/sulogin1.php">Login StartUp</a></li>


                        </ul>
                    </li>

                    <li class="dropdown">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <img src="icon.png" class="user"></a>
                        <ul class="dropdown-menu">
                            <?php if(isset($_SESSION['login_user']))
                            { ?>
                            <li><a href = "notify.php?uid=<?php echo $u_id;?>">Notifications</a></li>
                            <li><a href = "elogout.php">Sign Out</a></li>

                        </ul>
                        <ul class="dropdown">
                            <center><li><?php echo $user ?></li></center>
                        </ul>
                        <?php } ?>

                    </li>

                </ul>
                <div align="center">
                    <h1>Social Entrepreneur's Network</h1>

                </div>
            </div>
    </nav>
</div>


<div class="form-style-10">
    <a href="#hidden1" data-toggle="collapse">
        <h1>Basic Details<span></span></h1></a>
    <div id="hidden1" class="collapse">

        <div class="section"><span>1</span>Name :&nbsp&nbsp&nbsp&nbsp <?php echo $name?></div>  <br>

        <div class="section"><span>2</span>Email :&nbsp&nbsp&nbsp&nbsp <?php echo $email?></div> <br>

        <div class="section"><span>3</span>Startup :update later </div>

    </div>
</div>

<div class="form-style-10">
    <a href="#hidden4" data-toggle="collapse">
        <h1>Entrepreneur<span></span></h1></a>
    <div id="hidden4" class="collapse">

        <div class="section"><span>1</span>Skills : </div>
        <?php foreach($spl1 as $v1)
        {
            echo $v1."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details<input type="text" name="skill" /></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>
            </div>
        </form>

        <div class="section"><span>2</span>Work Experience : </div>
        <?php foreach($spl9 as $v9)
        {
            echo $v9."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details <input type="text" name="wexp" /></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>


            </div>
        </form>

        <div class="section"><span>3</span>Projects Worked : </div>
        <?php foreach($spl2 as $v2)
        {
            echo $v2."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details <input type="text" name="praccomp" /></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>

            </div>

            <div class="section"><span>3</span>Projects Working : </div>
            <?php foreach($spl3 as $v3)
            {
                echo $v3."<br>";
            }?>
            <form action="" method="post">
                <div class="inner-wrap">
                    <label>Enter details <input type="text" name="prcon" /></label>
                    <div class="button-section">
                        <input type="submit" value="Save" />

                    </div>

                </div>
            </form>

            <div class="section"><span>4</span>Specialization : </div>
            <?php foreach($spl4 as $v4)
            {
                echo $v4."<br>";
            }?>
            <form action="" method="post">
                <div class="inner-wrap">
                    <label>Enter details <input type="text" name="special" /></label>
                    <div class="button-section">
                        <input type="submit" value="Save" />

                    </div>

                </div>
            </form>



    </div>
</div>

<div class="form-style-10">
    <a href="#hidden2" data-toggle="collapse">
        <h1>Expert<span></span></h1></a>
    <div id="hidden2" class="collapse">

        <div class="section"><span>1</span>Domain Specialization : </div>
        <?php foreach($spl5 as $v5)
        {
            echo $v5."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details<input type="text" name="domain" /></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>
            </div>
        </form>

        <div class="section"><span>2</span>Projects Evaluated : </div>
        <?php foreach($spl6 as $v6)
        {
            echo $v6."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details <input type="text" name="peval" /></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>

            </div>

        </form>
    </div>



</div>


<div class="form-style-10">
    <a href="#hidden3" data-toggle="collapse">
        <h1>Investor<span></span></h1></a>
    <div id="hidden3" class="collapse">

        <div class="section"><span>1</span>Projects Funded : </div>
        <?php foreach($spl8 as $v8)
        {
            echo $v8."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details<input type="text" name="pfunded" /></label>
                <div class="button-section">
                    <input type="submit" value="Save" />

                </div>
            </div>
        </form>

        <div class="section"><span>2</span>Topics of Interest : </div>
        <?php foreach($spl7 as $v7)
        {
            echo $v7."<br>";
        }?>
        <form action="" method="post">
            <div class="inner-wrap">
                <label>Enter details <input type="text" name="topicofint" /></label>
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