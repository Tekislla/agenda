<?php

    function cadastrar(){                                                                         //CADASTRAR UM USUÁRIO

        $contatos = file_get_contents("contatos.json", true);                           //PEGAR OS DADOS DO ARQUIVO JSON
        $contatos = json_decode($contatos, true);                                      //CONVERTER DADOS JSON PARA ARRAY

        $contato = [
            "id"       => uniqid(),                                                                     //GERAR ID ÚNICO
            "nome"     => $_POST['nome'],                                           //PEGAR O VALOR 'NOME' DO FORMULÁRIO
            "email"    => $_POST['email'],                                         //PEGAR O VALOR 'EMAIL' DO FORMULÁRIO
            "telefone" => $_POST['telefone']                                    //PEGAR O VALOR 'TELEFONE' DO FORMULÁRIO
        ];

        array_push($contatos, $contato);                                                     //ADICIONA VALORES AO ARRAY

        $dados_json = json_encode($contatos, JSON_PRETTY_PRINT);                            //TRANSORMAR ARRAY PARA JSON

        file_put_contents("contatos.json", $dados_json);                            //ATUALIZAR CONTEÚDO DO ARQUIVO JSON

        header('Location: index.php');                                                //REDIRECIONAR PARA PÁGINA INICIAL


    }                                                                                                    //FIM DA FUNÇÃO

    function pegarContatos(){                                            //FUNÇÃO PARA PEGAR OS CONTATOS DO ARQUIVO JSON

        $contatos = file_get_contents("contatos.json", true);                           //PEGAR OS DADOS DO ARQUIVO JSON
        $contatos = json_decode($contatos, true);                                      //CONVERTER DADOS JSON PARA ARRAY

        return $contatos;                                                                         //RETORNAR OS CONTATOS

    }                                                                                                      //FIM DA FUNÇÃO

    function buscarContato($valorBuscado){                                               //FUNÇÃO PARA EDITAR UM CONTATO
        $contatos = file_get_contents("contatos.json", true);                           //PEGAR OS DADOS DO ARQUIVO JSON
        $contatos = json_decode($contatos, true);                                      //CONVERTER DADOS JSON PARA ARRAY

        foreach ($contatos as $contato) {                                    //TRATAR CADA CONTATO COMO UM CONTATO ÚNICO

            if($contato['id'] == $valorBuscado){                               //RETORNAR O CONTATO DE ACORDO COM SEU ID
                return $contato;
            }
        }

        return null;                                                        //RETORNAR NULO CASO NÃO ENCONTRE UM CONTATO

    }                                                                                                    //FIM DA FUNÇÃO

    function salvarContatoEditado($id){
        $contatosAuxiliar = file_get_contents('contatos.json');
        $contatosAuxiliar = json_decode($contatosAuxiliar, true);
        foreach ($contatosAuxiliar as $posicao => $contato){
            if ($contato['id'] == $id){

                $contatosAuxiliar[$posicao]['nome'] = $_POST['nome'];
                $contatosAuxiliar[$posicao]['email'] = $_POST['email'];
                $contatosAuxiliar[$posicao]['telefone'] = $_POST['telefone'];

                break;
            }
        }

        $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);
        file_put_contents('contatos.json', $contatosJson);

        header('Location: index.php');
    }

    function excluirContato($idContato){                                                //FUNÇÃO PARA EXCLUIR UM CONTATO

        $contatos = file_get_contents("contatos.json", true);                           //PEGAR OS DADOS DO ARQUIVO JSON
        $contatos = json_decode($contatos, true);                                      //CONVERTER DADOS JSON PARA ARRAY

        foreach($contatos as $posicao => $contato){                   //TRATAR CADA INFORMAÇÃO DO CONTATO EM SUA POSIÇÃO

            if($contato['id'] == $idContato){                                    //REMOVE O CONTATO DE ACORDO SOM SEU ID
                unset($contatos[$posicao]);
                break;
            }
        }

        $contatos = json_encode($contatos, JSON_PRETTY_PRINT);                              //TRANSORMAR ARRAY PARA JSON
        file_put_contents("contatos.json", $contatos);                                     //COLOCAR DADOS EM UM ARQUIVO

        header('Location: index.php');                                                //REDIRECIONAR PARA PÁGINA INICIAL
    }                                                                                                    //FIM DA FUNÇÃO

                                                                                                //GERENCIAMENTO DE ROTAS
    if ($_GET['acao'] == 'cadastrar'){
        cadastrar();                                                                     //CHAMADA PARA FUNÇÃO CADASTRAR
    } elseif($_GET['acao'] == 'excluir'){
        excluirContato($_GET['id']);                                                       //CHAMADA PARA FUNÇÃO EXCLUIR
    } elseif ($_GET['acao'] == 'editar'){
        salvarContatoEditado($_GET['id']);
    }