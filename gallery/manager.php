<!DOCTYPE html>
<html>
<head>
    <title>File manager</title>
    <script src="jquery.tabledit.js"></script>
    <script src="jquery.min.js"></script>
    <script src="custom_table_edit.js"></script>
</head>
<body>
<table id="data_table" class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $conn = mysqli_connect("db4free.net", "antonibarnabas", "password", "antoniftp");
    $sql_query = "SELECT id, image_text FROM pictures";
    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    while( $developer = mysqli_fetch_assoc($resultset) ) {
        ?>
        <tr id="<?php echo $developer ['id']; ?>">
            <td><?php echo $developer ['id']; ?></td>
            <td><?php echo $developer ['image_text']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
