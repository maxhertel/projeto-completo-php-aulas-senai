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
    public $id;
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
