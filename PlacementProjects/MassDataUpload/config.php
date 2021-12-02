<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'placement');
    define('DB_PASSWORD', 'b5x73ag0n7');
    define('DB_DATABASE', 'PLACEMENTMANAGEMENT');
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>
