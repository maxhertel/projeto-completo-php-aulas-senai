<?php
include_once '../classes/Pessoa.php';



$dataNascimento = new DateTime($_POST['dataNascimento']);
$hoje = new DateTime();
$idade = $hoje->diff($dataNascimento)->y;

if ($idade < 18) {
    $_SESSION['erro'] = "Você não pode se cadastrar (menor de idade)";
} else {
    $_SESSION['ok'] = "Você não pode se cadastrar (menor de idade)";
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
    $pessoa->salvarcsv();
}

header("Location: /paginas/cadastrar.php");
