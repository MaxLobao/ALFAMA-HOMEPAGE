<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
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
          <h1 class="text-start-title mb-4">Fazer login</h1>

          <p class="text-start mb-4 fw-bold text-dark">
            Nova conta? <a href="create.php" class="text-blue fw-semibold">Cadastre-se gratuitamente</a>
          </p>

          <form method="POST" id="form_login" novalidate>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu email" required>
            </div>

            <div class="mb-1 position-relative">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha" name="password" placeholder="Digite sua senha" required>
              <span id="toggleSenha" class="material-icons input-icon" role="button" tabindex="0" aria-label="Mostrar/ocultar senha">visibility_off</span>
              <div id="senhaErro" class="text-danger small mt-1 d-none">
                A senha deve ter no mínimo 8 caracteres.
              </div>
            </div>

            <div class="text-start mb-3">
              <a href="recuperar-senha.html" class="text-blue fw-semibold">Esqueceu sua senha?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
          </form>

          <div class="mt-4">
            <button type="button" class="btn btn-outline-dark w-100">
              <img src="https://img.icons8.com/color/16/000000/google-logo.png" class="me-2" />
              Entrar com Google
            </button>
          </div>

          <p class="text-center small-text mt-3">
            Ainda não tem conta? <a href="create.php"><strong class="text-blue fw-semibold">Crie uma agora</strong></a>
          </p>
        </main>

        <footer class="fw-bold text-dark">
          Politica de Privacidade
        </footer>
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

    toggleIcon.addEventListener('keypress', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        toggleIcon.click();
      }
    });

    document.getElementById('form_login').addEventListener('submit', function (e) {
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
