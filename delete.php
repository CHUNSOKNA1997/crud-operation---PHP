<?php
    include "./database.php";
    $uid = $_GET["id"];
    
    $sql = "DELETE FROM tbuser WHERE id = $uid";
    $isSuccess = $connection->query($sql);
   
    if($isSuccess){
        header("Location: read.php");
    }else{
        echo ("Error: " . $connection->error);
    }
?>