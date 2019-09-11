<?php
$server='localhost';
$database_user='root';
$database_password='Cs@1417317';

try {
    $conn=new PDO("mysql:host=$server;dbname=myapplication",$database_user,$database_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo"Connected Successfully";
} catch (PDOException $e) {
    //throw $th;
    echo"Connection failed :".$e->getMessage();
}

?>