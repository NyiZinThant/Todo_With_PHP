<?php
$user = "root";
$password = "";
$dbhost = "localhost";
$dbname = "todoPHP";

$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$user,$password,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);