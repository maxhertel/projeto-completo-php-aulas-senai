<?php
include '../includes/header.php';
$pessoaID = $_GET['pessoaid'];

// define que o caminho e igual a banco de dados
$caminho = '../banco/pessoas.csv';
//pessoas igual a dados cadastrados
$pessoa = [];
//verifica se existe o arquivo
if (file_exists($caminho)) {
    //abre o arquvo
    $arquivo = fopen($caminho, 'r');
    //organiza o arquivo
    $cabecalho = fgetcsv($arquivo, 0, ';');
    //percorre a linha
    while (($linha = fgetcsv($arquivo, 0, ';')) !== false) {
        if($linha[0] == $pessoaID) {
        $pessoa = $linha;
        }
    }
    //fecha o arquivo
    fclose($arquivo);
}

// define que o caminho e igual a banco de dados
$caminho = '../banco/estados.csv';
//pessoas igual a dados cadastrados
$estados = [];
//verifica se existe o arquivo
if (file_exists($caminho)) {
    //abre o arquvo
    $arquivo = fopen($caminho, 'r');
    //organiza o arquivo
    //percorre a linha
    while (($linha = fgetcsv($arquivo, 0, ';')) !== false) {
        
        $estados[] = $linha;

    }
    //fecha o arquivo
    fclose($arquivo);
}
?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Editar</h2>

    <div class="row g-4">
<form class="row g-4 p-4 bg-white shadow rounded" method="POST" action="/controllers/atualizar.php">

  <div class="col-md-6">
            <label for="nomeCompleto" class="form-label">Nome Completo</label>
            <input type="hidden"  name="id" value="<?=$pessoa[0]?>" required>
            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" value="<?=$pessoa[1]?>" required>
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?=$pessoa[2]?>" required>

        
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf"value="<?=$pessoa[5]?>" required>
        
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$pessoa[7]?>" required>
        
         
       
        </div>
        
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary px-4">Cadastrar</button>
        </div>

</form>

    </div>
</div>
<?php
include '../includes/footer.php'
    ?> 