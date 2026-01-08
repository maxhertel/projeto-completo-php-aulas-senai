<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
  <style>
    :root {
      --roxo: #7b2cbf;
      --azul: #4361ee;
      --ciano: #4cc9f0;
    }

    .navbar-custom {
      border-bottom: 3px solid var(--ciano);
      background: linear-gradient(90deg, var(--roxo), var(--azul));
    }

    .navbar-custom .nav-link {
      color: #fff !important;
      font-weight: 500;
    }

    .navbar-custom .nav-link:hover {
      color: var(--ciano) !important;
    }

    .search-btn {
      border-color: var(--ciano);
      color: var(--ciano);
    }

    .search-btn:hover {
      background-color: var(--ciano);
      color: #fff;
    }

    .search-input {
      border-radius: 20px;
      border: 1px solid var(--ciano);
    }

    body {

      min-height: 100vh;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/index.php">Home</a></li>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              Pessoas
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><a class="dropdown-item" href="/paginas/cadastrar_pessoa.php">Cadastrar</a></li>
              <li><a class="dropdown-item" href="/paginas/listar_pessoa.php">Listar</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              Usuários
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
               <li><a class="dropdown-item" href="/paginas/cadastrar_pessoa.php">Cadastrar</a></li>
              <li><a class="dropdown-item" href="/paginas/listar_pessoa.php">Listar</a></li>
            </ul>
          </div>
        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2 search-input" type="search" placeholder="Buscar..." aria-label="Search">
          <button class="btn search-btn" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
</body>

</html>