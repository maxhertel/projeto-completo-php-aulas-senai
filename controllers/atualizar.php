<?php
include_once '../classes/Pessoa.php';



        $pessoa = new Pessoa(
            $_POST['nomeCompleto'],
            $_POST['dataNascimento'],
            $_POST['cpf'],
            $_POST['email']
        );

    $pessoa->atualizar($_POST['id']);


header("Location: /paginas/cadastrar.php");
