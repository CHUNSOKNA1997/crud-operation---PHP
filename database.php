<?php
    define('DB_HOST', 'localhost:3307');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'db_user');

    $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($connection->connect_error){
     die ("Connection is error" . $connection->connect_error);
    }else
          echo "seccess";
?>