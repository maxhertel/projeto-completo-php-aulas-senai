<?php
require_once '../classes/Pdo.php';
use PdoSingleton;
class Pessoa
{

    public function __construct(
        $nomeCompleto,
        $dataNascimento,
        $cpf,
        $email,
    ) {
        $this->nomeCompleto = $nomeCompleto;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    // -----------------------------
    // Dados pessoais básicos
    // -----------------------------
    
    public $nomeCompleto;
    public $dataNascimento;
    public $cpf; //FALTA
    public $email;

    public function salvar()
    {
        //var_dump($this->dataNascimento);
        //die();
        $pdo = PdoSingleton::getInstance();

        $sql = 'INSERT INTO pessoas
                ( nome_completo, email, data_nascimento, cpf)
                VALUES( 
                :nome,:email , :data_nascimento, :cpf);';
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $this->nomeCompleto,
            ':data_nascimento' => $this->dataNascimento,
            ':cpf' => $this->cpf,
            ':email' => $this->email
        ]);


    }
    //
    public function atualizar($id)
    {
        
        $pdo = PdoSingleton::getInstance();

        $sql = "UPDATE pessoas
            SET nome_completo = :nome,
                data_nascimento = :data_nascimento,
                cpf = :cpf
            WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $this->nomeCompleto,
            ':data_nascimento' => $this->dataNascimento,
            ':cpf' => $this->cpf,
            ':id' => $id
        ]);
    }

}
