<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link href="custom.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form method="POST" action="uploader.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
        <input type="file" name="image">
    </div>
    <div>
      <textarea
              id="text"
              cols="40"
              rows="4"
              name="image_text"
              placeholder="Say something about this image..."></textarea>
    </div>
    <div>
        <button type="submit" name="upload">POST</button>
        <button type="button" name="return" onclick="location.href='index.php'">Return to HOMEPAGE</button>
    </div>
</form>
</body>
</html>


