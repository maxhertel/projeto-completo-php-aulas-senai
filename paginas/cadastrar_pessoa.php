<?php include '../includes/header.php'; 

session_start();
if (isset($_SESSION['ok'])) {
    echo "<p style='color:red'>" . $_SESSION['erro'] . "</p>";

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
    <h2 class="mb-4 text-center">Cadastrar Pessoa</h2>

    <form class="row g-4 p-4 bg-white shadow rounded" method="POST" action="/controllers/salvar_pessoa.php">

        <div class="col-md-6">
            <label for="nomeCompleto" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>
        </div>

        <div class="col-md-6">
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
        </div>

      
        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="col-md-4">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary px-4">Cadastrar</button>
        </div>

    </form>
</div>

<?php include '../includes/footer.php'; ?>