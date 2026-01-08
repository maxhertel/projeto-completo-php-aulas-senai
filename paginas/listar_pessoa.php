<?php include '../includes/header.php'; ?>

<h2>Lista de Pessoas</h2>


<?php
require_once '../classes/Pdo.php';

use PdoSingleton;

$pdo = PdoSingleton::getInstance();

$sql = "SELECT id,nome_completo,email,data_nascimento,cpf
        FROM pessoas
        ORDER BY id ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// transforma o resultado em array
$pessoas = $stmt->fetchAll(PDO::FETCH_NUM);
// ou FETCH_ASSOC (explico abaixo)
?>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col">email</th>
            <th scope="col">data nascimento</th>
            <th scope="col">cpf</th>
            <th scope="col">Ação</th>
        </tr>

    <tbody>
        <?php
        //compara pessoas com linha
        foreach ($pessoas as $linha): ?>
            <tr>
                <?php //compara pessoa com valor
                    foreach ($linha as $valor): ?>
                    <td><?=//prenche com o valor
                                $valor ?></td>
                <?php endforeach; ?>
                <td><a href="/paginas/editar.php?pessoaid=<?php echo ($linha[0]) ?>" class="btn btn-primary">Editar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>