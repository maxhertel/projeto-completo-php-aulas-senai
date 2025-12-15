<?php include '../includes/header.php'; ?>

<h2>Lista de Pessoas</h2>


<?php
// define que o caminho e igual a banco de dados
$caminho = '../banco/pessoas.csv';
//pessoas igual a dados cadastrados
$pessoas = [];
//verifica se existe o arquivo
if (file_exists($caminho)) {
    //abre o arquvo
    $arquivo = fopen($caminho, 'r');
    //organiza o arquivo
    $cabecalho = fgetcsv($arquivo, 0, ';');
    //percorre a linha
    while (($linha = fgetcsv($arquivo, 0, ';')) !== false) {
        $pessoas[] = $linha;
    }
    //fecha o arquivo
    fclose($arquivo);
}
$pessoasExibir = 0;
if($_GET){
    
    foreach ($pessoas as $key => $pessoa) {
        if( $_GET['pessoaID'] == $pessoa[0]){
            $pessoasExibir = $pessoa;
        }
    }
    var_dump($pessoasExibir);
}
?>
<div class="card">
    <div class="card-body">
        <!-- CRIAR UM SELECT QUE VAI LISTAR TODAS AS PEESSOAS -->
        <?php
            // define que o caminho e igual a banco de dados
            $caminho = '../banco/pessoas.csv';
            //pessoas igual a dados cadastrados
            $pessoas = [];
            //verifica se existe o arquivo
            if (file_exists($caminho)) {
                //abre o arquvo
                $arquivo = fopen($caminho, 'r');
                //organiza o arquivo
                $cabecalho = fgetcsv($arquivo, 0, ';');
                //percorre a linha
                while (($linha = fgetcsv($arquivo, 0, ';')) !== false) {
                    $pessoas[] = $linha;
                }
                //fecha o arquivo
                fclose($arquivo);
            }
        ?>
        <form class="row g-3" action="">
        <div class="col-auto">
            <select class="form-select" name="pessoaID">
                <option value="0">Escolha uma pessoas para exibir os dados</option>
                 <?php
        //compara pessoas com linha
        foreach ($pessoas as $linha): ?>
           
                   
                   <option value="<?=$linha[0]?>"><?=$linha[1]?></option>
               

        <?php endforeach; ?>
            </select>
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Buscar Dados</button>
        </div>
        </form>
    </div>
</div>
<!-- pegar todos os dados usando PHP para mostrar
 no HTMKL -->
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Aqui será apresentdo todos os dados de uma pessoas de forma bonite</h5>
    <p class="card-text">vai mostrar todos s dados da pessoas que foi selecionada</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php include '../includes/footer.php'; ?>