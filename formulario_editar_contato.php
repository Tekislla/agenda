<?php
    require 'controlador_agenda.php';
    $contato = editarContato($_GET['id']);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="">
    <input name="nome"     value="<?= $contato['nome'] ?>"     type="text">
    <input name="email"    value="<?= $contato['email'] ?>"    type="email">
    <input name="telefone" value="<?= $contato['telefone'] ?>" type="text">

    <input type="submit" value="editar contato">
</form>

</body>
</html>