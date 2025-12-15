<?php

class Pessoa
{

    public function __construct(
        $nomeCompleto,
        $id,
        $dataNascimento,
        $genero,
        $estadoCivil,
        $cpf,
        $rg,
        $email,
        $telefone,
        $celular,
        $altura,
        $peso,
        $endereco
    ) {
        // Dados básicos
        $this->id = $id;
        $this->nomeCompleto = $nomeCompleto;
        $this->dataNascimento = $dataNascimento;
        $this->genero = $genero;
        $this->estadoCivil = $estadoCivil;

        // Documentos
        $this->cpf = $cpf;
        $this->rg = $rg;

        // Contato
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;

        // Informações físicas
        $this->altura = $altura;
        $this->peso = $peso;

        // Endereço
        if (is_array($endereco)) {
            $this->endereco = array_merge($this->endereco, $endereco);
        }

        // Datas automáticas
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

    public function salvarcsv()
    {
        $arquivo = '../banco/pessoas.csv';

        // Se o arquivo não existir, cria com cabeçalho
        if (!file_exists($arquivo)) {

            $cabecalho = [
                'id',
                'nomeCompleto',
                'dataNascimento',
                'genero',
                'estadoCivil',
                'cpf',
                'rg',
                'email',
                'telefone',
                'celular',
                'altura',
                'peso',
                'rua',
                'numero',
                'bairro',
                'cidade',
                'estado',
                'cep',
                'complemento',
                'dataCadastro',
                'ultimaAtualizacao'
            ];

            $arquivoHandle = fopen($arquivo, 'a');
            fputcsv($arquivoHandle, $cabecalho, ';');
            fclose($arquivoHandle);
        }

        // -----------------------------------------------------
        // GERAR ID AUTOMATICAMENTE
        // -----------------------------------------------------

        $ultimoId = 0;

        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (count($linhas) > 1) {
            $ultimaLinha = $linhas[count($linhas) - 1];
            $dados = str_getcsv($ultimaLinha, ';');
            $ultimoId = intval($dados[0]);
        }

        $novoId = $ultimoId + 1;

        // -----------------------------------------------------

        // Abrir arquivo para Append
        $arquivoHandle = fopen($arquivo, 'a');

        // Linha seguindo a ordem do construtor
        $linha = [
            $novoId,
            $this->nomeCompleto,
            $this->dataNascimento,
            $this->genero,
            $this->estadoCivil,
            $this->cpf,
            $this->rg,
            $this->email,
            $this->telefone,
            $this->celular,
            $this->altura,
            $this->peso,

            // Endereço desmembrado
            $this->endereco['rua'] ?? '',
            $this->endereco['numero'] ?? '',
            $this->endereco['bairro'] ?? '',
            $this->endereco['cidade'] ?? '',
            $this->endereco['estado'] ?? '',
            $this->endereco['cep'] ?? '',
            $this->endereco['complemento'] ?? '',

            // Datas automáticas
            $this->dataCadastro,
            $this->ultimaAtualizacao
        ];

        // Salvar linha
        fputcsv($arquivoHandle, $linha, ';');
        fclose($arquivoHandle);

        return true;
    }
    //
    public function atualizarcsv($pessoaID)
    {

        
        // Caminho do arquivo CSV onde os dados estão armazenados
        $arquivo = '../banco/pessoas.csv';

        // Se o arquivo não existir, não há como atualizar
        if (!file_exists($arquivo)) {
            return false;
        }

        // Lê todas as linhas do arquivo CSV para um array
        // FILE_IGNORE_NEW_LINES → remove \n
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);

        // Array que vai armazenar todas as linhas (antigas + atualizadas)
        $dadosAtualizados = [];

        // Percorre todas as linhas do arquivo
        foreach ($linhas as $index => $linha) {

            // Converte a linha CSV em array usando ';' como separador
            $colunas = str_getcsv($linha, ';');

            // Se for a primeira linha, é o cabeçalho
            if ($index === 0) {
                // Mantém o cabeçalho sem alterações
                $dadosAtualizados[] = $colunas;
                continue;
            }

            // Verifica se o ID da linha atual é o mesmo que queremos atualizar
            if ($colunas[0] == $pessoaID) {

                // Substitui a linha antiga pelos novos dados do objeto
                $dadosAtualizados[] = [
                    $pessoaID,                     // ID da pessoa
                    $this->nomeCompleto,           // Nome completo
                    $this->dataNascimento,         // Data de nascimento
                    $this->genero,                 // Gênero
                    $this->estadoCivil,            // Estado civil
                    $this->cpf,                    // CPF
                    $this->rg,                     // RG
                    $this->email,                  // Email
                    $this->telefone,               // Telefone fixo
                    $this->celular,                // Celular
                    $this->altura,                 // Altura
                    $this->peso,                   // Peso

                    // Dados de endereço (com proteção caso não existam)
                    $this->endereco['rua'] ?? '',
                    $this->endereco['numero'] ?? '',
                    $this->endereco['bairro'] ?? '',
                    $this->endereco['cidade'] ?? '',
                    $this->endereco['estado'] ?? '',
                    $this->endereco['cep'] ?? '',
                    $this->endereco['complemento'] ?? '',

                    // Data de cadastro permanece a mesma
                    $this->dataCadastro,

                    // Atualiza automaticamente a data da última alteração
                    date('Y-m-d H:i:s')
                ];

            } else {
                // Se não for o ID procurado, mantém a linha original
                $dadosAtualizados[] = $colunas;
            }
        }

        // Abre o arquivo em modo escrita (apaga tudo e reescreve)
        $arquivoHandle = fopen($arquivo, 'w');

        // Grava todas as linhas novamente no arquivo CSV
        foreach ($dadosAtualizados as $linha) {
            fputcsv($arquivoHandle, $linha, ';');
        }

        // Fecha o arquivo
        fclose($arquivoHandle);

        // Retorna true indicando que a atualização foi concluída
        return true;
    }

}
