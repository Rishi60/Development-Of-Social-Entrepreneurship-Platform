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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <!-- Including our scripting file. -->

    <script>

        //Getting value from "ajax.php".

        function fill(Value) {

            //Assigning value to "search" div in "search.php" file.

            $('#search').val(Value);

            //Hiding "display" div in "search.php" file.

            $('#display').hide();

        }

        $(document).ready(function() {

            //On pressing a key on "Search box" in "search.php" file. This function will be called.

            $("#search").keyup(function() {

                //Assigning search box value to javascript variable named as "name".

                var name = $('#search').val();

                //Validating, if "name" is empty.

                if (name == "") {

                    //Assigning empty value to "display" div in "search.php" file.

                    $("#display").html("");

                }

                //If name is not empty.

                else {

                    //AJAX is called.

                    $.ajax({

                        //AJAX type is "Post".

                        type: "POST",

                        //Data will be sent to "ajax.php".

                        url: "fetch.php",

                        //Data, that will be sent to "ajax.php".

                        data: {

                            //Assigning value of "name" into "search" variable.

                            search: name

                        },

                        //If result found, this funtion will be called.

                        success: function(html) {

                            //Assigning result to "display" div in "search.php" file.

                            $("#display").html(html).show();

                        }

                    });

                }

            });

        });

    </script>

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
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


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
                                </ul>
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
                    <li id="first">Blog's <img src="arrow.png" width="25" height="25">&nbsp Search Result</li>

                </ul>
            </div>
        </nav>
    </div>




    <div id="display"></div>



    <?php
    if(isset($_SESSION['login_user'])) {
        ?>

        <div data-role="main">
            <a href="#myPopup" data-rel="popup"
               class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-right">Create Blog</a>

            <div data-role="popup" id="myPopup" style="min-width:250px;">
                <div class="form-style-10">
                    <form action="" method="post">
                        <div class="section"><span>1</span>Blog name :</div>
                        <div class="inner-wrap">
                            <label>Enter details<input type="text" name="blogname"/></label>
                        </div>


                        <div class="section"><span>2</span>Blog details:</div>

                        <div class="inner-wrap">
                            <label>Enter details <textarea name="blog" id="comments"
                                                           style="font-family:sans-serif;font-size:1.2em;"></textarea></label>
                            <div class="button-section">
                                <div class="section"><span>1</span>Social Toppic :</div>
                                <div class="inner-wrap">
                                    <label>Enter details<input type="text" name="stopic"/></label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>


        <?php
    }
        /*if($_SERVER["REQUEST_METHOD"] == "POST")
        {*/
            $bname=$_POST["se"];
            $result1 = mysqli_query($conn, "select * from blog where blogname='$bname';");
            $count1 = $result1->num_rows;
            if ($count1 > 0)
            {
        ?>


    <h3><em>BLOGS :</em></h3>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($result1))
            {
            ?>


            <!-- Blog Entries Column -->
            <div>

                <!-- Blog Post -->
                <div id="border">
                    <div>
                        <h2 class="card-title"><?php echo $row["blogname"]; ?></h2><br>
                        <h4 class="card-title"><?php echo $row["socialtopic"]; ?></h4>
                        <p class="card-text">
                            <a href="#hidden<?php echo $i; ?>" class="btn btn-primary" data-toggle="collapse">Read More
                                &rarr;</a>
                            <div id="hidden<?php echo $i; ?>" class="collapse">
                        <p style="text-align:justify">
                            <?php echo $row["summary"]; ?></p></div>
                </div>
                <div class="card-footer text-muted">
                    BY <?php echo $row["uname"]; ?>
                </div>
            </div>
            </div>
            <?php
            $i = $i + 1;
             }
        }
            else
                {
                echo "No blogs Found";
            }
        //}

        ?>

        <div class="container">

            <div class="row">
                <!-- Pagination -->
            </div>
        </div>
    </div>

    <!-- Sidebar Widgets Column -->

</div>

<!-- Categories Widget -->

<!-- /.row -->

<!-- /.container -->


<!-- Bootstrap core JavaScript -->

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
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

</body>
</html>

