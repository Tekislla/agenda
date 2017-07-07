<?php
require 'controlador_agenda.php';
$meusContatos = pegarContatos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container" style="margin-top: 30px;">

    <h1 align="center">Meus Contatos</h1>
    <br/>
    <br>

    <!-- CADASTRO-->
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" action="controlador_agenda.php?acao=cadastrar" method="post" >

                <!--nome-->
                <div class="col-md-3">
                    <label for="nome"></label>
                    <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
                </div>

                <!--email-->
                <div class="col-md-3">
                    <label for="email"></label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>

                <!--telefone-->
                <div class="col-md-4">
                    <label for="telefone"></label>
                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone">
                </div>

                <button type="submit" class="btn btn-primary">CADASTRAR
                    <span class="glyphicon glyphicon-save"></span>
                </button>
                <br><br>
                <div class="row">
                    <div class="col-md-12" style="margin-left: 20px">
                        <form action="index.php?acao=buscar" method="post">
                            <div class="input-group col-md-10" style="float: left">
                                <input type="text" class="form-control" id="busca" name="busca" value="<?= $_POST['busca'] ?>" placeholder="Busca">
                                <div class="input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                            <?php if ($_GET['acao'] == 'buscar'): ?>
                                <div class="form-group  col-md-1">
                                    <a class="btn btn-success form-group" style="float: right"  href="index.php">LIMPAR</a>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <br>
    <br>
    <br>

    <!--CONTATOS-->
    <div class="row">
        <div class="col-md-12">

            <!-- Conteúdo -->
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <!-- repetir -->
                <?php foreach ($meusContatos as $contato): ?>
                    <tr>
                        <td><?= $contato['id'] ?>      </td>
                        <td><?= $contato['nome'] ?>    </td>
                        <td><?= $contato['email'] ?>   </td>
                        <td><?= $contato['telefone'] ?></td>
                        <td>
                            <a href="controlador_agenda.php?acao=excluir&id=<?= $contato['id'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </a>
                            <a href="formulario_editar_contato.php?id=<?= $contato['id'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>