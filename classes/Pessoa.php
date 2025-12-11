<?php

class Pessoa
{
    // -----------------------------
    // Dados pessoais básicos
    // -----------------------------
    public $id;
    public $nomeCompleto;
    public $dataNascimento;
    public $genero; //FALTA
    public $estadoCivil; //FALTA

    // -----------------------------
    // Documentos
    // -----------------------------
    public $cpf; //FALTA
    public $rg; //FALTA

    // -----------------------------
    // Contato
    // -----------------------------
    public $email; //FALTA
    public $telefone; //FALTA
    public $celular; //FALTA

    // -----------------------------
    // Endereço
    // -----------------------------
    public $endereco = [
        'rua' => '',
        'numero' => '',
        'bairro' => '',
        'cidade' => '',
        'estado' => '',
        'cep' => '',
        'complemento' => ''
    ];

    // -----------------------------
    // Informações físicas
    // -----------------------------
    public $altura;
    public $peso;
    public $tipoSanguineo;


    // -----------------------------
    // Histórico
    // -----------------------------
    public $dataCadastro;
    public $ultimaAtualizacao;


    // -----------------------------
    // CONSTRUTOR
    // -----------------------------
    public function __construct($id, $nomeCompleto, $dataNascimento, $email)
    {
        $this->id = $id;
        $this->nomeCompleto = $nomeCompleto;
        $this->dataNascimento = $dataNascimento;
        $this->email = $email;

        $this->dataCadastro = date('Y-m-d H:i:s');
        $this->ultimaAtualizacao = date('Y-m-d H:i:s');
    }

    // -----------------------------
    // MÉTODOS AUXILIARES
    // -----------------------------

    // Calcula idade automaticamente
    public function getIdade()
    {
        $dataNasc = new DateTime($this->dataNascimento);
        $hoje = new DateTime();
        return $hoje->diff($dataNasc)->y;
    }

    // Atualiza a data da última modificação
    public function atualizar()
    {
        $this->ultimaAtualizacao = date('Y-m-d H:i:s');
    }

    // Retorna o nome curto
    public function getPrimeiroNome()
    {
        return explode(' ', $this->nomeCompleto)[0];
    }

    // Retorna o endereço formatado
    public function getEnderecoCompleto()
    {
        return "{$this->endereco['rua']}, {$this->endereco['numero']} - "
             . "{$this->endereco['bairro']}, {$this->endereco['cidade']} - "
             . "{$this->endereco['estado']}, CEP: {$this->endereco['cep']}";
    }


    
}
