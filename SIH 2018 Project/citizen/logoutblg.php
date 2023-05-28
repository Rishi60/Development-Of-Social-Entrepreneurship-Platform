<html>
<body>
<?php
session_start();

if(session_destroy()) {
    ?>
<a href = "http://localhost/sep/login.php">GO TO LOGIN PAGE</a>
<?php
}
?>
</body>
</html>
