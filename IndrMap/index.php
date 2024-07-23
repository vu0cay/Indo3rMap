<?php
session_start();
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
