<?php

class Pessoa
{

    public function __construct(
    $id,
    $nomeCompleto,
    $dataNascimento,
    $email,
    $genero = null,
    $estadoCivil = null,
    $cpf = null,
    $rg = null,
    $telefone = null,
    $celular = null,
    $altura = null,
    $peso = null,
    $tipoSanguineo = null,
    $endereco = []
) {
    // Dados básicos
    $this->id = $id;
    $this->nomeCompleto = $nomeCompleto;
    $this->dataNascimento = $dataNascimento;
    $this->email = $email;

    // Campos opcionais
    $this->genero = $genero;
    $this->estadoCivil = $estadoCivil;
    $this->cpf = $cpf;
    $this->rg = $rg;
    $this->telefone = $telefone;
    $this->celular = $celular;
    $this->altura = $altura;
    $this->peso = $peso;
    $this->tipoSanguineo = $tipoSanguineo;

    // Endereço (faz merge com padrão)
    $this->endereco = array_merge($this->endereco, $endereco);

    // Datas do sistema
    $this->dataCadastro = date('Y-m-d H:i:s');
    $this->ultimaAtualizacao = date('Y-m-d H:i:s');
}
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
