<?php
include 'config.php';

$corretor = [];
$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("SELECT * FROM corretores WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount()> 0){
        $corretor = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("location: index.php");
        exit;
    }
}else{
    header("location: index.php");
}

?>
<link rel="stylesheet" href="style.css">
<h1>Editar Corretor</h1>
    
<div class="form-container">
    <form action="edit_action.php" method="POST">
        <input type="hidden" name="id" value="<?=$corretor['id'];?>">

        <input class="camp-1" type="text" name="cpf" minlength="11" maxlength="11" value="<?=$corretor['cpf'];?>">

        <input class="camp-2" type="text" name="creci" minlength="2" value="<?=$corretor['creci'];?>"> <br>

        <input class="camp-3" type="text" name="name" minlength="2" value="<?=$corretor['name'];?>"> <br>

        <button class="b-send" type="submit">Salvar</button>
    </form>
</div>
