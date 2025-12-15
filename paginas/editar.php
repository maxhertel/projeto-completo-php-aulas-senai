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
            <label for="genero" class="form-label">Gênero</label>
            <select id="genero" name="genero" value="<?=$pessoa[3]?>"class="form-select">
                <option value="" >Selecione...</option>
                <option value="M" <?php if($pessoa[3] == 'M')echo('selected') ?> >Masculino</option>
                <option value="F" <?php if($pessoa[3] == 'F')echo('selected') ?>>Feminino</option>
                <option value="I" <?php if($pessoa[3] == 'I')echo('selected') ?>>Indefinido</option>
            </select>
            <label for="estadoCivil" class="form-label">Estado Civil</label>
            <select id="estadoCivil" name="estadoCivil" class="form-select">
                <option value="" >Selecione...</option>
                <option value="C" <?php if($pessoa[4] == 'C')echo('selected') ?>>Casado</option>
                <option value="S" <?php if($pessoa[4] == 'S')echo('selected') ?>>Solteiro</option>
                <option value="D" <?php if($pessoa[4] == 'D')echo('selected') ?>>Divorciado</option>
                <option value="V" <?php if($pessoa[4] == 'V')echo('selected') ?>>Viúvo</option>
            </select>
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf"value="<?=$pessoa[5]?>" required>
            
            <label for="rg" class="form-label">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" value="<?=$pessoa[6]?>" required>
         
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$pessoa[7]?>" required>
        
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$pessoa[8]?>" required>

            <label for="celular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" value="<?=$pessoa[9]?>" required>
        
            <label for="rg" class="form-label">altura</label>
            <input type="text" class="form-control" id="rg" name="altura" value="<?=$pessoa[10]?>" required>

            <label for="rg" class="form-label">peso</label>
            <input type="text" class="form-control" id="rg" name="peso" value="<?=$pessoa[11]?>" required>
        
            <label for="rua" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="rua" name="endereco[rua]" value="<?=$pessoa[12]?>" placeholder="Rua..." required>
        
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="endereco[numero]" value="<?=$pessoa[13]?>" required>
            
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="endereco[cidade]" value="<?=$pessoa[15]?>" required>
        
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado"class="form-select" value="<?=$pessoa[16]?>" required>

                <?php
                    foreach ($estados as $key => $estado) {
                       echo "<option value='$estado[1]'".($estado[1] == $pessoa[16] ? " selected ": 'none')." >$estado[2]</option>";
                    }
                ?>
               
             <!-- mantenha os outros estados -->
            </select>
         
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="endereco[cep]" value="<?=$pessoa[17]?>"  required>
       
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