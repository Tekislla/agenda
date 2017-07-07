<?php
    require 'controlador_agenda.php';
    $contato = buscarContato($_GET['id']);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<h1 align="center">Edite o Contato</h1>
<form class="form-horizontal" action="controlador_agenda.php?acao=editar&id=<?= $contato['id'] ?>" method="post">
    <fieldset>
        <br><br>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nome</label>
            <div class="col-md-4">
                <input name="nome" value="<?= $contato['nome'] ?>" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>
            <div class="col-md-4">
                <input name="email" value="<?= $contato['email'] ?>" type="email" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Telefone</label>
            <div class="col-md-4">
                <input name="telefone" value="<?= $contato['telefone'] ?>" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Salvar
                    <span class="glyphicon glyphicon-ok"</button>
                </button>
            </div>
        </div>

    </fieldset>
</form>
</body>
</html>