<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Cadastrar Pessoa</h2>

    <form class="row g-4 p-4 bg-white shadow rounded" method="POST" action="/controllers/salvar.php">

        <div class="col-md-6">
            <label for="nomeCompleto" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>
        </div>

        <div class="col-md-6">
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="endereco[dataNascimento]" required>
        </div>

        <div class="col-md-6">
            <label for="rua" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="rua" name="endereco[rua]" placeholder="Rua..." required>
        </div>

        <div class="col-md-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="endereco[numero]" required>
        </div>

        <div class="col-md-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="endereco[cep]" required>
        </div>

        <div class="col-md-6">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="endereco[cidade]" required>
        </div>

        <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado" class="form-select" required>
                <option value="" selected>Selecione...</option>
                <option value="PR">Paraná</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <!-- mantenha os outros estados -->
            </select>
        </div>

        <div class="col-md-4">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
        </div>

        <div class="col-md-4">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" required>
        </div>

        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="col-md-4">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>

        <div class="col-md-4">
            <label for="rg" class="form-label">RG</label>
            <input type="text" class="form-control" id="rg" name="rg">
        </div>

        <div class="col-md-4">
            <label for="genero" class="form-label">Gênero</label>
            <select id="genero" name="genero" class="form-select">
                <option value="" selected>Selecione...</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="I">Indefinido</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="estadoCivil" class="form-label">Estado Civil</label>
            <select id="estadoCivil" name="estadoCivil" class="form-select">
                <option value="" selected>Selecione...</option>
                <option value="C">Casado</option>
                <option value="S">Solteiro</option>
                <option value="D">Divorciado</option>
                <option value="V">Viúvo</option>
            </select>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary px-4">Cadastrar</button>
        </div>

    </form>
</div>

<?php include '../includes/footer.php'; ?>