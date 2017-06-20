<?php
//controlador agenda

$contatos = file_get_contents("contatos.json");
$contatos = json_decode($contatos, true);

$contato = [
    "id"       => uniqid(),
    "nome"     => "joao",
    "email"    => "jplazarim@gmail.com",
    "telefone" => "(47)99198-5098"
];


array_push($contatos, $contato);


$dados_json = json_encode($contatos, JSON_PRETTY_PRINT);

file_put_contents("contatos.json", $dados_json);

print_r($dados_json);