<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../app/styles.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row vh-100">

      <div class="col-sm-5 d-flex flex-column justify-content-between p-4 bg-white">

        <nav class="navbar navbar-white bg-white px-3">
          <a class="navbar-brand" href="login.php">
            <img src="../assets/alfamaweb_color.png" alt="Logo AlfamaWeb" style="height: 40px;">
          </a>
          <a type="button" class="nav-link dropdown-toggle" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Saiba Mais
          </a>
          <?php include('modalPrincipia.php'); ?>
        </nav>

        <main>
          <h1 class="text-start-title mb-4">Criar Conta</h1>

          <div class="mb-4">
            <button class="btn btn-outline-dark w-100">
              <img src="https://img.icons8.com/color/16/000000/google-logo.png" class="me-2" />
              Faça login com Google
            </button>
          </div>

          <div class="position-relative text-center my-4">
            <hr class="m-0 border-top border-1 border-secondary" style="opacity: 0.2;">
            <span class="position-absolute top-50 start-50 translate-middle px-2 bg-white text-muted small">ou</span>
          </div>

          <form method="POST" id="form_register" novalidate>
            <div class="mb-3">
              <label for="name" class="form-label">Digite seu nome completo</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome completo" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Digite seu email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="mb-1 position-relative">
              <label for="senha" class="form-label">Crie uma senha</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Crie uma senha" required>
              <span id="toggleSenha" class="material-icons input-icon">visibility_off</span>
            </div>
            <div class="form-hint mb-2">Inserir mais de 8 caracteres</div>
            <div id="senhaErro" class="form-error d-none mb-2 text-danger">A senha deve ter pelo menos 8 caracteres.</div>

            <button type="submit" class="btn btn-primary w-100">Criar Conta</button>
          </form>

          <p class="login-link-text mt-3">
            Já tem uma conta? <a href="login.php">Faça login</a>
          </p>
        </main>

        <footer></footer>
      </div>

      <div class="col-sm-7 d-none d-sm-block p-0 h-100 position-relative">
         <?php include('carouselPrincipia.php'); ?>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="scripts.js?v=1.0.3"></script>
  <script>
    const senhaInput = document.getElementById('senha');
    const toggleIcon = document.getElementById('toggleSenha');

    toggleIcon.addEventListener('click', () => {
      const isHidden = senhaInput.type === 'password';
      senhaInput.type = isHidden ? 'text' : 'password';
      toggleIcon.textContent = isHidden ? 'visibility' : 'visibility_off';
    });

    document.getElementById('form_register').addEventListener('submit', function (e) {
      const senha = senhaInput.value;
      const erroEl = document.getElementById('senhaErro');

      if (senha.length < 8) {
        e.preventDefault();
        erroEl.classList.remove('d-none');
      } else {
        erroEl.classList.add('d-none');
      }
    });
  </script>
</body>
</html>
