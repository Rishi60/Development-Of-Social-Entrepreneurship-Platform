<html>
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<?php
require("functions.php");
$conn=getConnection();
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
  SELECT * FROM blog 
  WHERE blogname LIKE '%".$search."%'
  OR socialtopic LIKE '%".$search."%' 
  OR summary LIKE '%".$search."%' 
  
 ";
}
else
{
    $query = "
  SELECT * FROM blog ORDER BY b_id;
 ";
}
$result1 = mysqli_query($conn,$query);
$count1=$result1->num_rows;
if($count1>0)
{?>

<center>
<div>
    <span style="margin-right: 5px;"><a href="create.php">New Blogs</a></span>|
    <span style="margin:0 5px;"><a href="analysis.php">Blogs Analysis</a></span>|
    <span style="margin-right: 5px;"><a href="blog.php">Blogs List</a></span>
</div>
<div><h3>Blog List</h3></div>
</center>
    <!-- Page Content -->
<div class="container">
    <div class="row">
        <?php
        $i=1;
        while ($row = mysqli_fetch_array($result1))
        {
        ?>



        <!-- Blog Entries Column -->
        <div>

            <!-- Blog Post -->
            <div id="border">
                <div>
                    <h2 class="card-title"><?php echo $row["blogname"];?></h2><br>
                    <h4 class="card-title"><?php echo $row["socialtopic"];?></h4>
                    <p class="card-text">
                        <a href="#hidden<?php echo $i;?>" class="btn btn-primary" data-toggle="collapse">Read More &rarr;</a>
                        <div id="hidden<?php echo $i;?>" class="collapse">
                    <p style="text-align:justify">
                        <?php echo $row["summary"];;?></p></div>
            </div>
            <div class="card-footer text-muted">
                BY  <?php echo $row["uname"];?>
            </div>
        </div>

    <?php
    $i=$i+1;
    }
    }
    else
    {
        echo "No blogs Found";
    }

    ?>

    <div class="container">

        <div class="row">
            <!-- Pagination -->
        </div>
    </div>
</div>
</div>

<!-- Sidebar Widgets Column -->












</html>