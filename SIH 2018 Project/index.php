<?php
require("functions.php");
$conn=getConnection();
if(isset($_POST["signup-name"])){

    $name = $_POST["signup-name"];
    $uname = $_POST["signup-username"];
    $email = $_POST["signup-email"];
    $type = $_POST["signup-type"];
    $psw = $_POST["signup-password"];
    $flag = 1;
    $flag1 = 0;
    if ($type == "Ministry Official") {
        $authid = $_POST["authid"];
        $query1 = "SELECT * from auth WHERE auth_id='{$authid}'";
        $result1 = $conn->query($query1);
        if ($result1->num_rows < 0) {

            echo "Invalid authentication id";
            echo "<br>";
            $flag = 0;

        } else {
            while ($row1 = $result1->fetch_assoc()) {


                $mname = $row1["ministryname"];


            }
        }

    }

    if (isset($uname)) {
        $query = "SELECT username from user WHERE username='{$uname}'";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result)) {
            echo "username exists";

        } else {
            $flag1 = 1;

        }

    }
    if ($flag == 1 && $flag1 == 1) {


        $sql = "insert into user (name,username,password,email,type) values('$name','$uname','$psw','$email','$type')";

        mysqli_query($conn, $sql);
        $sql2 = "select user_id from user where username='{$uname}'";
        $ID = mysqli_query($conn, $sql2);
        $result = mysqli_fetch_array($ID);
        $value = $result[0];

        if($type=="Entrepreneur") {

            $sql4 = "insert into eprofile(u_id) values('$value')";
            mysqli_query($conn, $sql4);
        }
        header('Location: http://localhost/sep/login/login.php');

    }

}
else if(isset($_POST["signin-username"])) {
    session_start();
   

    $usernamep = $_POST["signin-username"];
    $passp = $_POST["signin-password"];
    $sql = "select * from user where username='{$usernamep}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $typep = $row["type"];


        }
    }
    $a = "Blogger";
    $b = "Entrepreneur";
    $c = "Ministry Official";
    if ($typep == $a) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$a'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            header("location: http://localhost/sep/citizen/blog.php");
        } else {
            echo "Citizen username or password is wrong";
        }
    } elseif ($typep == $b) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$b'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            //$_SESSION['login_type'] = $typep;
            header("location: http://localhost/sep/entrepreneur/ehome.php");
        } else {
            echo " Entrepreneur username or password is wrong";
        }
    } else if ($typep == $c) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$c'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            //$_SESSION['login_type'] = $typep;
            header("location:http://localhost/sep/ministryofficial/mohome.php");
        } else {
            echo " Ministry Official username or password is wrong";
        }
    } else {
        echo "Type doesn't match";
    }


}



mysqli_close($conn);
?>

<!DOCTYPE html>

<html>


<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#type").change(function () {
                if ($(this).val() == "Ministry Official") {
                    $("#authid").show();
                } else {
                    $("#authid").hide();
                }
            });
        });
    </script>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    <link rel="stylesheet" href="css/demo.css"> <!-- Demo style -->
  
    <link rel="stylesheet" type="text/css" href="assets/css/header footer tester.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    
  
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    
   
</head>




<style>
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


<body>
    <div class="header-nightsky">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" ><img src="assets/img/logo.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home</a></li>
                        
                    </ul>

		</div>
            </div>
        </nav>
        <div class="hero">
            <h1>Social Entrepreneur's Network</h1>
            <p>Innovative Young Minds </p>
             <ul class="cd-main-nav__list js-signin-modal-trigger">
            <div class="btn btn-primary" href="#0" data-signin="login">Log In</div>&nbsp;&nbsp;&nbsp;<div class="btn btn-primary" href="#0" data-signin="signup">Sign Up</div>
            <br><br><br><br>
              </ul>
          
            <section id="section01" class="demo">
                <a href="#section02"><span></span>Scroll</a>
            </section>
 
        </div>
    </div><!-- END OF HEADING-->
    
    
    
    
    
    
    
    
    
    
    <?php
    if(!isset($_SESSION['login_user'])){
    ?>
    <form action="" method="post"
    <!-- Pop Up -->
    <div class="cd-signin-modal js-signin-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-signin-modal__container"> <!-- this is the container wrapper -->
			<ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
				<li><a href="#0" data-signin="login" data-type="login">Sign in</a></li>
				<li><a href="#0" data-signin="signup" data-type="signup">New account</a></li>
			</ul>

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="login"> <!-- log in form -->
				<form class="cd-signin-modal__form" name="lgform" action="" method="post"
                      >
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--name cd-signin-modal__label--image-replace" for="signin-username">Username</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" type="text" name="signin-username"  placeholder="Username">
						<span class="cd-signin-modal__error">Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Password</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signin-password" type="password"  placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a>
						<span class="cd-signin-modal__error">Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="remember-me" checked class="cd-signin-modal__input ">
						<label for="remember-me">Remember me</label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Login">
					</p>
				</form>
				
				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="reset">Forgot your password?</a></p>
			</div> <!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="signup"> <!-- sign up form -->
				<form class="cd-signin-modal__form" action="" method="post" name="myForm">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--name cd-signin-modal__label--image-replace" for="signup-name">Name</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" type="text" name="signup-name"   placeholder="Name">

					</p>
                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--name cd-signin-modal__label--image-replace" for="signup-username">Username</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" type="text" name="signup-username"   placeholder="Username">

                    </p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signup-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" type="email" name="signup-email"   placeholder="E-mail">

					</p>

                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--name cd-signin-modal__label--image-replace" for="signup-type">Account Type</label>
                        <select class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signup-type"  >
                            <option value="">--SELECT Account Type--</option>


                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Blogger">Blogger</option>
                            <option value="Ministry Official">Ministry Official</option>


                        </select>
                        <br>
                    <div id="authid" style="display: none">
                        <var>Authorization Id:</var>
                        <input type="text" id="authid" name="authid" /><br>
                    </div>

                    </p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signup-password">Password</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signup-password" type="password"  placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a>

					</p>
                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signup-cpassword">Confirm Password</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signup-cpassword" type="password" placeholder="Confirm Password">

                    </p>


                    <p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="accept-terms" class="cd-signin-modal__input ">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" action="" value="Create account">
					</p>
				</form>
			</div> <!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="reset"> <!-- reset password form -->
				<p class="cd-signin-modal__message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="reset-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="login">Back to log-in</a></p>
			</div> <!-- cd-signin-modal__block -->
			<a href="#0" class="cd-signin-modal__close js-close">Close</a>
		</div> <!-- cd-signin-modal__container -->
	</div> <!-- cd-signin-modal -->

    </form>
    <?php } ?>
    <div class="container text-center">
        <br><h2><section id="section02"> </section>
            Some basic terms.
        </h2><br>
        
        
        <div class="row">
            <div class="col-sm-4">
                <div class="grow">
                <a href="e" id="entrepreneur" class="footer-box">
                    <h5 class="text-left">Entrepreneur</h5>
                    <p class="text-left">
                        Starter,Perception of Opportunity,Take calculated Risk,Maintain Tenacity.
                    </p>
                </a></div>
                
            </div>
            
            <div class="col-sm-4"><div class="grow">
                <a href="#" id="investor" class="footer-box">
                    <h5 class="text-left">Investor</h5>
                    <p class="text-left">
                        Speculation,Capital Allocation,Interest area, Future financial return.
                    </p>
                </a></div>
                
            </div>
            
            <div class="col-sm-4"><div class="grow">
                <a href="#" id="expert" class="footer-box">
                    <h5 class="text-left">Expert</h5>
                    <p class="text-left">
                        Personal & Collaborative views,Innovative Ideas, Inception,Elaboration.
                    </p>
                </a></div>
                
            </div>
            
            
        </div><br><br>
        <div class="row">
            <div class="col-sm-4"><div class="grow">
                <a href="#" id="ministry" class="footer-box">
                    <h5 class="text-left">Ministry</h5>
                    <p class="text-left">
                        Government organization like Central,State,Union.
                    </p>
                </a></div>
                
            </div>
             <div class="col-sm-4"><div class="grow">
                <a href="#" id="blog" class="footer-box">
                    <h5 class="text-left">Blog</h5>
                    <p class="text-left">
                        Personal & collaborative views,Innovative Ideas, Inception,elaboration.
                    </p>
                </a></div>
                
            </div>
	    
		<div class="col-sm-4">
                    <div class="grow">
                <a href="#" id="projects" class="footer-box">
                    <h5 class="text-left">Projects</h5>
                    <p class="text-left">
                        Personal & collaborative views,Innovative Ideas, Inception,elaboration.
                    </p>
                </a>
                
            </div>  
            
        </div>
        </div>
    </div><br><br>
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
        
        
        
        
<script src="js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
<script src="js/main.js"></script> <!-- Resource JavaScript --> 
<script src='js/scroll.js'></script>

       
</body>
</html>

