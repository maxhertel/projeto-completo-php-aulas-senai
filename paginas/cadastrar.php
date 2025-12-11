<?php
include '../includes/header.php'
//logica para salvar pessoas usando a classe
?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Cadastar</h2>

    <div class="row g-4">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="nomeCompleto" class="form-label">Nome Completo</label>
                <input type="email" class="form-control" id="nomeCompleto" name="nomeCompleto">
            </div>
            <div class="col-md-6">
                <label for="dataNascimento" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
            </div>
            <div class="col-12">
                <label for="rua" class="form-label">Endenreço </label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua...">
            </div>
            <div class="col-12">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero">
            </div>
            <div class="col-md-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Estado</label>
                <select id="Estado" class="form-select">
                    <option value="" selected>Selecione...</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>

            </div>
            <div class="col-md-2">
                <label for="cep" class="form-label">CEP</label>
                <input type="cep" class="form-control" id="cep" name="cep">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastar</button>
            </div>
        </form>


    </div>


    <div class="row g-4">



    </div>

    <div class="row g-4">



    </div>
</div>
<?php
include '../includes/footer.php'
?>