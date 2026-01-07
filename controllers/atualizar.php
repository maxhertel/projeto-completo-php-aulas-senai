<?php
include_once '../classes/Pessoa.php';



$dataNascimento = new DateTime($_POST['dataNascimento']);
$hoje = new DateTime();
$idade = $hoje->diff($dataNascimento)->y;



    $pessoa = new Pessoa(
        $_POST['nomeCompleto'],     // 1
        $_POST['id'],               // 2
        $_POST['dataNascimento'],   // 3
        $_POST['genero']          // 4
    );
    $pessoa->atualizar($_POST['id']);


header("Location: /paginas/cadastrar.php");
