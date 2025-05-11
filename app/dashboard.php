<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'config.php';
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Estilos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="../app/styles.css" />

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body class="bg-light">
  <!-- NAVBAR -->
  <nav class="navbar bg-nav-dashboard p-3 mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a class="navbar-brand" href="login.php">
        <img src="../assets/alfamaweb_offcolor.png" alt="Logo" style="height: 40px;">
      </a>
      <div class="dropdown">
        <a class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="material-icons">clear_all</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
             <a class="dropdown-item text-danger" href="#" id="delete-account">
              <span class="material-icons">delete</span> Deletar usuário
            </a>
          </li>
          <li>
            <a class="dropdown-item" id="logout-link" href="#">
              <span class="material-icons">logout</span> Sair
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTEÚDO PRINCIPAL -->
  <div class="container">
    <!-- FOTO DE PERFIL -->
    <div class="text-center mb-4">
      <div class="position-relative d-inline-block">
        <img src="../assets/perfil.png" class="rounded-circle border" alt="Foto de perfil" style="width: 120px; height: 120px; object-fit: cover;">
        <span class="material-icons position-absolute bottom-0 end-0 bg-white border rounded-circle p-1"
              style="cursor: pointer;">
          photo_camera
        </span>
      </div>
      <h4 class="name-dashboard mt-3 mb-0" id="display_name">
        <?php echo htmlspecialchars($user['nome_completo'] ?? 'Nome do Usuário'); ?>
      </h4>
      <p class="subtitle-dashboard" id="display_empresa">
        <?php echo htmlspecialchars($user['empresa'] ?? 'Empresa não cadastrada'); ?>
      </p>
    </div>

    <!-- FORMULÁRIO -->
    <form id="form_edit" method="POST">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Nome Completo</label>
          <input type="text" class="form-control" id="name" name="nome_completo"
                 placeholder="Digite seu nome"
                 value="<?php echo htmlspecialchars($user['nome_completo'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email"
                 placeholder="Digite seu email"
                 value="<?php echo htmlspecialchars($user['email'] ?? '') ?>" readonly>
        </div>

        <div class="col-md-6">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone"
                 placeholder="Digite seu telefone"
                 value="<?php echo htmlspecialchars($user['telefone'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf"
                 placeholder="Digite seu CPF"
                 value="<?php echo htmlspecialchars($user['cpf'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label for="empresa" class="form-label">Empresa</label>
          <input type="text" class="form-control" id="empresa" name="empresa"
                 placeholder="Digite sua empresa"
                 value="<?php echo htmlspecialchars($user['empresa'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco"
                 placeholder="Digite seu endereço"
                 value="<?php echo htmlspecialchars($user['endereco'] ?? '') ?>">
        </div>
      </div>

      <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">Atualizar cadastro</button>
      </div>
      <div class="mt-3" id="message_container"></div>
    </form>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="scripts.js?v=1.0.3"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>

</html>
