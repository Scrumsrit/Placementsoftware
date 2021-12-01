<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'spoonkawinsp');
    define('DB_DATABASE', 'placementmanagement');
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>