<html>
<body>
<?php
require("esession.php");
?>
<a href="suprofile.php">Profile</a>
<a href="sulogout.php">SIGNOUT</a>
<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon" focusable="false"><path d="M21,13H13v8H11V13H3V11h8V3h2v8h8v2Z" class="large-icon" style="fill: currentColor"></path></svg>
<?php


$sql="select su_id from suregister where suname='{$name}'";
$result1=$conn->query($sql);
$row1 = $result1->fetch_assoc();
$suid=$row1["su_id"];



?>

<form name="lgform" action="" method="post">
    Search Bar: <input type="text" name="searchp">
    Filter: <input type="text" name="filter">
    <input type="submit" value="Submit">
</form>
<?php
$result1 = mysqli_query($conn,"select su_id from suregister where suname='$name'");
$count1=$result1->num_rows;
if($count1>0)
{
    while ($row = mysqli_fetch_array($result1))
    {
        $su_id=$row["su_id"];
    }
}
echo "<br>Solutions Approved</br>";
$result1c = mysqli_query($conn,"SELECT * from solution where status='APPROVED' AND uorsu_id='$su_id'");
$count1c=$result1c->num_rows;
if($count1c>0)
{
    while ($row = mysqli_fetch_array($result1c))
    {
        $s_id =$row["s_id"];
        $p_id =$row["p_id"];
        $vidlink= $row["vidlink"];
        $doclink= $row["doclink"];
        $description= $row["description"];
        $timestamp=$row["timestamp"];
        $remarks = $row["remarks"];
        $linkd="http://localhost/sep/entrepreneur/documents/".$doclink;
        $linkv="http://localhost/sep/entrepreneur/videos/".$vidlink;
//echo $linkd;
//echo $linkv;
        echo "<br>";
        echo $s_id."    ".$p_id."   ";
        echo "    ";?>

    <a  href="<?php echo $linkd ?>" target="_blank">Open solution Document </a><?php echo "   "?>
    <a  href="<?php echo $linkv ?>" target="_blank">Open media file </a><?php echo "   "?>
        <?php
        echo "    ";
        echo $description;
        echo "    ";
        echo $timestamp;
        echo "    ";
        echo $remarks;
        echo "</br>";
    }
}
else
{
    echo "No Solutions Approved";
}


echo "<br>Solutions Rejected</br>";
$result1r = mysqli_query($conn,"SELECT * from solution where status='REJECTED' AND uorsu_id='$su_id'");
$count1r=$result1r->num_rows;
if($count1r>0)
{
    while ($row = mysqli_fetch_array($result1r))
    {
        $s_id =$row["s_id"];
        $p_id =$row["p_id"];
        $vidlink= $row["vidlink"];
        $doclink= $row["doclink"];
        $description= $row["description"];
        $timestamp=$row["timestamp"];
        $remarks = $row["remarks"];
        $linkd="http://localhost/sep/entrepreneur/documents/".$doclink;
        $linkv="http://localhost/sep/entrepreneur/videos/".$vidlink;
//echo $linkd;
//echo $linkv;
        echo "<br>";
        echo $s_id."    ".$p_id."   ";
        echo "    ";?>

    <a  href="<?php echo $linkd ?>" target="_blank">Open solution Document </a><?php echo "   "?>
    <a  href="<?php echo $linkv ?>" target="_blank">Open media file </a><?php echo "   "?>
        <?php
        echo "    ";
        echo $description;
        echo "    ";
        echo $timestamp;
        echo "    ";
        echo $remarks;
        echo "</br>";
    }
}
else
{
    echo "No Solutions Rejected";
}

echo "<br>Solutions Submitted</br>";
$result1r = mysqli_query($conn,"SELECT * from solution where uorsu_id='$su_id'");
$count1r=$result1r->num_rows;
if($count1r>0)
{
    while ($row = mysqli_fetch_array($result1r))
    {
        $s_id =$row["s_id"];

        $p_id =$row["p_id"];
        $vidlink= $row["vidlink"];
        $doclink= $row["doclink"];
        $description= $row["description"];
        $timestamp=$row["timestamp"];
        $remarks = $row["remarks"];
        $linkd="http://localhost/sep/entrepreneur/documents/".$doclink;
        $linkv="http://localhost/sep/entrepreneur/videos/".$vidlink;
//echo $linkd;
//echo $linkv;
        echo "<br>";
        echo $s_id."    ".$p_id."   ";
        echo "    ";?>

    <a  href="<?php echo $linkd ?>" target="_blank">Open solution Document </a><?php echo "   "?>
    <a  href="<?php echo $linkv ?>" target="_blank">Open media file </a><?php echo "   "?>
        <?php
        echo "    ";
        echo $description;
        echo "    ";
        echo $timestamp;
        echo "    ";
        echo $remarks;
        echo "</br>";
    }
}
else
{
    echo "No Solutions submitted";
}

echo "<br>Problem Table</br>";
$a=date("Y-m-d");
$b=date("h:i:sa");
$tstamp=$a.$b;
echo $tstamp;

$result = mysqli_query($conn,"select * from problem");
$count=$result->num_rows;
if($count>0)
{
    while ($row = mysqli_fetch_array($result))
    {
        echo "<br>".$row["p_id"];
        echo $row["pstatement"];
        echo $row["ministryname"];
        echo $row["domain"]."</br>";
    }
}
else
{
    echo "No problems to display";
}
?>
<!--           Problem ID             -->
<form name="lgform" action="" method="post" enctype="multipart/form-data">
    Problem ID: <input type="text" name="p_id">
    Idea description<textarea name="ideadesc" id="ideadsc" style="font-family:sans-serif;font-size:1.2em;"></textarea>
    Upload Document<input type="file" name="fileToUpload" id="fileToUpload">
    Upload Video<input type="file" name="fileToUploadv" id="fileToUploadv">
    <input type="submit" value="Submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $p_id = $_POST["p_id"];
    $ideadesc = $_POST["ideadesc"];
    $target_dir = "documents/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "pdf") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $fnamed = basename($_FILES["fileToUpload"]["name"]);
            $flag1=1;
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $target_dir1 = "videos/";
    $target_file1 = $target_dir1 . basename($_FILES["fileToUploadv"]["name"]);
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
    if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
        && $imageFileType1 != "gif" && $imageFileType1 != "pdf" && $imageFileType1 != "mp4") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk1 = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk1 == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUploadv"]["tmp_name"], $target_file1)) {
            $fnamev = basename($_FILES["fileToUploadv"]["name"]);
            //echo "The file " . basename($_FILES["fileToUploadv"]["name"]) . " has been uploaded.";

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    //echo $fnamed;
    //echo $fnamev;
    $sql = "INSERT INTO solution (p_id,doclink,vidlink,description,uorsu_id,timestamp,status) values('$p_id','$fnamed','$fnamev','$ideadesc','$su_id','$tstamp','NOTAPPROVED')";
    if ($conn->query($sql) === TRUE)
    {

        $result1 = mysqli_query($conn,"select s_id from solution where p_id='$p_id' AND uorsu_id='$su_id'");
        if($result1->num_rows>0)
        {
            while ($row1 = mysqli_fetch_array($result1))
            {
                $s_id = $row1["s_id"];
            }
        }
        echo "Solution Added successfully";
        header("location:ehome.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "<br>SUGGSTIONS</br>";

$results = mysqli_query($conn,"select suggestions.s_id,suggestions.esuggestion,suggestions.isuggestion,suggestions.name from suggestions inner join solution on solution.s_id=suggestions.s_id where solution.uorsu_id='$su_id'");
$counts=$results->num_rows;
if($counts>0)
{
    while ($row = mysqli_fetch_array($results))
    {
        $s_id=$row["s_id"];
        $esugg=$row["esuggestion"];
        $isugg=$row["isuggestion"];
        $ename=$row["name"];
        echo "<br>";
        echo $s_id;
        echo $esugg;
        echo $isugg;
        echo $ename;
        echo "</br>";
    }
}
else
{
    echo "No Suggestions";
}




?>
</body>
</html>




