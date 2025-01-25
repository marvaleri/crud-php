<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$cpf = filter_input(INPUT_POST, 'cpf');
$creci = filter_input(INPUT_POST, 'creci');

if($id && $name && $cpf && $creci){
    $sql = $pdo->prepare("UPDATE corretores SET name = :name, cpf = :cpf, creci = :creci WHERE id = :id");

    $sql->bindValue(":name", $name);
    $sql->bindValue(":cpf", $cpf);
    $sql->bindValue(":creci", $creci);
    $sql->bindValue(":id", $id);

    $sql->execute();

    header("location: index.php");
    exit;
}else{
    header("location: index.php");
    exit;
}