<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', ''); #username
    define('DB_PASSWORD', ''); #password
    define('DB_DATABASE', ''); #database
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>
