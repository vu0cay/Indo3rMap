<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./logout.php">logout</a>
    <?php
    if(isset($_SESSION["uname"])) {
        echo "Hello";

    } else {
        header('Location: login.php');
    }
    ?>
</body>
</html>