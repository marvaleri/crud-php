<?php
include 'config.php';

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$creci = $_POST['creci'];

$sql = "INSERT INTO corretores SET name = :name, cpf = :cpf, creci = :creci";
$sql = $pdo->prepare($sql);

$sql->bindValue(":name", $name);
$sql->bindValue(":cpf", $cpf);
$sql->bindValue(":creci", $creci);

$sql->execute();

header("location: index.php");
?>