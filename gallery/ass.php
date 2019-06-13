<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <link href="custom.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="header">
    <h1>Gallery</h1>
    <button type="button" onclick="location.href='upload.php'">Upload a file!</button>
</div>
<input id="searchbar" onkeyup="search()" type="text"
       name="search" placeholder="Search content..">
<ol class="list">
    <?php

    require_once('connect.php');

    $r= $mysqli->query("SELECT * FROM `pictures` ORDER BY `id` DESC");
    $count=$r->num_rows;

    if($count > 0) {
        while ($row = $r->fetch_assoc()) {
            echo '<li class="content"><a href="'. $row['url']  .'" download><img src="'. $row['url']  . '". ><span>'. $row['name'] .'</span></a></li>';
        }
    }

    $lastupdated = '2019.05.25 10:26';

    ?>
</ol>
<script src="./custom.js"></script>
<div class="footer">
    <p>Created by:</p>
</div>
</body>
</html>