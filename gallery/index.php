<?php
$db = mysqli_connect("db4free.net", "antonibarnabas", "password", "antoniftp");
$result = mysqli_query($db, "SELECT * FROM pictures");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link href="custom.css" rel="stylesheet" type="text/css">
    <script src="custom.js"></script>
</head>
<body>
<div class="searchbarspc">
    <div class="searchbar">
        <input id="searchbar" onkeyup="search()" type="text"
               name="search" placeholder="Search content..">
    </div>
</div>
<div class="content">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='img_div'>";
        echo "<a href='".$row['image']."' download><img src='".$row['image']."' ></a>";
        echo "<p>".$row['image_text']."</p>";
        echo "</div>";
    }
    ?>
    <button type="button" value="Upload a file!!" onclick="location.href='upload.php'">Upload a file!!!</button>
    <button type="button" onclick="location.href='adminer-4.7.1.php'">Manage Files!</button>
</div>
</body>
</html>