<?php //controlador da agenda

    function cadastrar(){

        $contatos = file_get_contents("contatos.json", true);
        $contatos = json_decode($contatos, true);

        $contato = [
            "id"       => uniqid(), //gera um id novo e diferente sempre
            "nome"     => $_POST['nome'],
            "email"    => $_POST['email'],
            "telefone" => $_POST['telefone']
        ];

        array_push($contatos, $contato);

        $dados_json = json_encode($contatos, JSON_PRETTY_PRINT);

        //atualizar conteúdo do arquivo
        file_put_contents("contatos.json", $dados_json);

        header('location: index.php');

    } //fim cadastrar()

    function pegarContatos(){

        $contatos = file_get_contents("contatos.json", true);
        $contatos = json_decode($contatos, true);

        return $contatos;

    }

    //GERENCIAMENTO DE ROTAS
    if ($_GET['acao'] == 'cadastrar'){
        cadastrar();
    }