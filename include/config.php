<?php
/* 2020 Fall Web Programming 3 (e) */
try{
    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $conn = new PDO("mysql:host=localhost;dbname=web3", 
        "root", "mysql", $option); // set your own root password (if required)
}catch(PDOException $e){
    die($e->getMessage());
}
?>