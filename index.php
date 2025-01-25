<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>teste</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Cadastro de Corretor</h1>
    
    <div class="form-container">
        <form action="insert.php" method="POST">
            <input class="camp-1" type="text" name="cpf" placeholder="Digite seu CPF"
            minlength="11" maxlength="11">

            <input class="camp-2" type="text" name="creci" placeholder="Digite seu Creci"
            minlength="2"> <br>

            <input class="camp-3" type="text" name="name" placeholder="Digite seu Nome"
            minlength="2"> <br>

            <button class="b-send" type="submit">Enviar</button>
        </form>
    </div>
  </body>
</html>

<?php
include 'config.php';

$list = [];
$sql = $pdo->query("SELECT * FROM corretores");

if($sql->rowCount()> 0){
    $list = $sql->fetchAll();
}else{
    return Array();
}

foreach($list as $item):
    ?>
    <table class="show-itens" border="1">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CPF</th>
            <th>CRECI</th>
            <th>ACTIONS</th>
        </tr>
        <tr>
            <td><?=$item['id'];?></td>
            <td><?=$item['name'];?></td>
            <td><?=$item['cpf'];?></td>
            <td><?=$item['creci'];?></td>
            <td>
                <a href="edit.php?id=<?=$item['id'];?>"><button class="b-edit">Editar</button></a>
                <a href="delete.php?id=<?=$item['id'];?>"><button class="b-delete">Deletar</button></a>
            </td>
        <hr>
    </table>
    <?php
endforeach;