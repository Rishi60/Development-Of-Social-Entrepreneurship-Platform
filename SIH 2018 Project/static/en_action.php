<?php
/**
 * Created by PhpStorm.
 * User: AKASH
 * Date: 30-03-2018
 * Time: 12:23 PM
 */
?>
<div class="col-7 align_center">
    <span class="mr-2">
        <a href="../en/" style="color: white">Entrepreneur</a>
    </span>|
    <div class="btn-group ml-1">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Go To
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="../en/accsol.php">Accepted Solutions</a>
            <a class="dropdown-item" href="../en/supsol.php">Suspended Solutions</a>
            <a class="dropdown-item" href="../en/subsol.php">Submitted Solutions</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </div>
</div>
<div class="col-5 align_center">
    <div class="input-group align_center">
        <a href="../blogs/" class="btn btn-success mr-3" role="button" aria-disabled="true">Blogs</a>
        <select class="custom-select" id="selectid">
            <option selected value="none">Choose...</option>
            <option value="Ministry">Ministry</option>
            <option value="Domain">Domain</option>
            <option value="Entrepreneur">Entrepreneur</option>
        </select>
        <input type="text" class="form-control" id="tokenid" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-info" type="submit" onclick="postsearch();">Search</button>
        </div>
    </div>
</div>
