<?php include '../includes/header.php'; ?>

<h2>Lista de Pessoas</h2>


<?php
// Puxar do banco com select 
// Criar uma array para usar no foreach


?>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col">data nascimento</th>
            <th scope="col">genero</th>
            <th scope="col">estadoCivil</th>
            <th scope="col">cpf</th>
            <th scope="col">rg</th>
            <th scope="col">email</th>
            <th scope="col">telefone</th>
            <th scope="col">celular</th>
            <th scope="col">altura</th>
            <th scope="col">peso</th>
            <th scope="col">rua</th>
            <th scope="col">numero rua</th>
            <th scope="col">bairro</th>
            <th scope="col">cidade</th>
            <th scope="col">estado</th>
            <th scope="col">cep</th>
            <th scope="col">D</th>
            <th scope="col">Date cadastro</th>
            <th scope="col">Date atualização</th>
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