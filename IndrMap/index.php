
<?php
// Dung Session kiem tra neu session da duoc gan gia tri => dang nhap hop le => su dung app
// Neu session chua co gia tri=> quay lai login.php
session_start();
if(!isset($_SESSION['uname'])){
  // header de chuyen huong trang php
  header('Location: ../Login.php');
};
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quick Start</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./libs/ol/ol.css">
    
</head>
  <body>
    <div id="map" class="map"></div>
    <a href="../logout.php">Logout</a>
    
    <script type="module" src ="./main.js"></script>
    <script src="./libs/ol/dist/ol.js"></script>
   
</body>
</html>
