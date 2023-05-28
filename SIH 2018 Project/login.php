<html>
<body>
<head>
    <script>
        function validateForm() {
            var x1 = document.forms["lgform"]["username"].value;
            if (x1 == "") {
                alert("Name must be filled out");
                return false;
            }
            var x2 = document.forms["lgform"]["pass"].value;
            if (x2 == "") {
                alert("password must be filled out");
                return false;
            }
            var x3 = document.forms["lgform"]["type"].value;
            if (x3 == "") {
                alert("type must be filled out");
                return false;
            }
        }
    </script>
</head>

<form name="lgform" action="" method="post"
      onsubmit="return validateForm()" method="post">
    <br>username: <input type="text" name="username"></br>
    <br>Password: <input type="password" name="pass"></br>
    <br>Type:     <input type="text" name="type"></br>
    <input type="submit" value="LogIn">

</form>

<?php

require("functions.php");
$conn = getConnection();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $usernamep = $_POST["username"];
    $passp = $_POST["pass"];
    $typep=$_POST["type"];
    $a="citizen";
    $b="entrepreneur";
    if($typep==$a)
    {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$a'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            header("location: citizen/blog.php");
        } else
            {
            echo "citizen username or password is wrong";
        }
    }
    elseif($typep==$b)
    {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernamep' AND password='$passp' AND type='$b'");
        $count = $result->num_rows;
        if ($count == 1) {
            //session_register("mhusernamep");
            $_SESSION['login_user'] = $usernamep;
            //$_SESSION['login_type'] = $typep;
            header("location: entrepreneur/ehome.php");
        } else
        {
            echo " Entrepreneur username or password is wrong";
        }
    }
    else
    {
        echo "Type doesn't match";
    }


}
?>


</body>
</html>