<?php
if(isset($_POST['password'])){
    var_dump(password_hash($_POST['password'], PASSWORD_BCRYPT));
}
?>
<!DOCTYPE html>
<html>
<body>
<form action="hasher.php" method="post">
    <input type="text" name="password">
    <button type="submit">HASH IT!</button>
</form>
</body>
</html>
