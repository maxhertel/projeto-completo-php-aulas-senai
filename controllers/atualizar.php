<?php
include_once '../classes/Pessoa.php';



$dataNascimento = new DateTime($_POST['dataNascimento']);
$hoje = new DateTime();
$idade = $hoje->diff($dataNascimento)->y;



    $pessoa = new Pessoa(
        $_POST['nomeCompleto'],     // 1
        $_POST['id'],               // 2
        $_POST['dataNascimento'],   // 3
        $_POST['genero'],           // 4
        $_POST['estadoCivil'],      // 5
        $_POST['cpf'],              // 6
        $_POST['rg'],               // 7
        $_POST['email'],            // 8
        $_POST['telefone'],         // 9
        $_POST['celular'],          // 10
        $_POST['altura'],           // 11
        $_POST['peso'],             // 12
        $_POST['endereco']          // 13
    );
    $pessoa->atualizarcsv($_POST['id']);


header("Location: /paginas/cadastrar.php");
