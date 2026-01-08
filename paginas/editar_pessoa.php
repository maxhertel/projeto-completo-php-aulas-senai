<?php
include '../includes/header.php';
$pessoaID = $_GET['pessoaid'];


require_once '../classes/Pdo.php';

use PdoSingleton;

$pdo = PdoSingleton::getInstance();

$sql = "SELECT id,nome_completo,email,data_nascimento,cpf
        FROM pessoas
        WHERE id = $pessoaID
        ORDER BY id ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// transforma o resultado em array
$pessoa = $stmt->fetchAll(PDO::FETCH_NUM);

$pessoa = $pessoa[0];
// ou FETCH_ASSOC (explico abaixo)

?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Editar</h2>

    <div class="row g-4">
<form class="row g-4 p-4 bg-white shadow rounded" method="POST" action="/controllers/atualizar_pessoa.php">

  <div class="col-md-6">
            <label for="nomeCompleto" class="form-label">Nome Completo</label>
            <input type="hidden"  name="id" value="<?=$pessoa[0]?>" required>
            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" value="<?=$pessoa[1]?>" required>
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?=$pessoa[3]?>" required>

        
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf"value="<?=$pessoa[4]?>" required>
        
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$pessoa[2]?>" required>
        
         
       
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