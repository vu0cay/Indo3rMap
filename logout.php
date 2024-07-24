<!-- File nay phuc vu cho viec huy session va chuyen huong nguoi dung ve trang login -->
<?php
session_start();
unset($_SESSION);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        header('Location: login.php');
    ?>
</body>
</html>