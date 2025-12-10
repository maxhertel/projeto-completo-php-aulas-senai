<?php
    include './includes/header.php'
?>

        <div class="container mt-5">
            <h2 class="mb-4 text-center">Dashboard</h2>

            <div class="row g-4">
                
                <!-- Número de pessoas cadastradas -->
                <div class="col-md-4">
                    <div class="card shadow-sm text-center p-3">
                        <h5 class="card-title">Pessoas Cadastradas</h5>
                        <h2 class="text-primary fw-bold">120</h2>
                    </div>
                </div>

                <!-- Média de idade -->
                <div class="col-md-4">
                    <div class="card shadow-sm text-center p-3">
                        <h5 class="card-title">Média de Idade</h5>
                        <h2 class="text-success fw-bold">28</h2>
                    </div>
                </div>

                <!-- Média de peso -->
                <div class="col-md-4">
                    <div class="card shadow-sm text-center p-3">
                        <h5 class="card-title">Média de Peso (kg)</h5>
                        <h2 class="text-danger fw-bold">72.5</h2>
                    </div>
                </div>

            </div>
        </div>
<?php
    include './includes/footer.php'
?>