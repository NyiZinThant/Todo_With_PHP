<?php
require "config.php";
$id = $_GET["id"];

$pdostatement = $pdo->prepare("DELETE FROM todo WHERE id=:id");
$pdostatement->execute([
    ":id" => $id
]);

header("location: index.php");