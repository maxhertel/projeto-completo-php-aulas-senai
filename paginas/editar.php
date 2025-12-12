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

var_dump($pessoa);
?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Editar</h2>

    <div class="row g-4">
<form class="row g-4 p-4 bg-white shadow rounded" method="POST" action="/controllers/atualizar.php">

  <div class="col-md-6">
            <label for="nomeCompleto" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" value="<?=$pessoa[1]?>" required>
        </div>

</form>

    </div>
</div>
<?php
include '../includes/footer.php'
    ?>