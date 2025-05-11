<?php
header('Content-Type: application/json');
session_start();

include('config.php');


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] == 'register') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Este e-mail já está cadastrado.']);
    exit;
}
            // Adicionando dados na tabela usuarios
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome_completo, email, senha) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $password]);
            echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
        }

        if ($_POST['action'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);            
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['senha'])) {
                $_SESSION['user_id'] = $user['id'];
                echo json_encode(['success' => true, 'message' => 'Login bem-sucedido!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'E-mail ou senha incorretos.']);
            }
        }

        if ($_POST['action'] == 'edit') {
            $user_id = $_SESSION['user_id'];

            $fields = [];

            // Verifica quais campos chegaram para edição
            if (!empty($_POST['nome_completo'])) {
                $fields['nome_completo'] = $_POST['nome_completo'];
            }

            if (!empty($_POST['telefone'])) {
                $fields['telefone'] = $_POST['telefone'];
            }

            if (!empty($_POST['cpf'])) {
                $fields['cpf'] = $_POST['cpf'];
            }

            if (!empty($_POST['empresa'])) {
                $fields['empresa'] = $_POST['empresa'];
            }

            if (!empty($_POST['endereco'])) {
                $fields['endereco'] = $_POST['endereco'];
            }

            // Monta a query de forma dinâmica
            if (!empty($fields)) {
                $set = [];
                $values = [];
                foreach ($fields as $key => $value) {
                    $set[] = "$key = ?";
                    $values[] = $value;
                }

                $values[] = $user_id;

                $stmt = $pdo->prepare("UPDATE usuarios SET " . implode(', ', $set) . " WHERE id = ?");
                $stmt->execute($values);
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Perfil atualizado com sucesso!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Nenhum campo foi atualizado.']);
            }
        }

       if ($_POST['action'] == 'delete') {
            $user_id = $_SESSION['user_id'];
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt->execute([$user_id]);
            session_destroy();
            echo json_encode(['success' => true, 'message' => 'Usuário deletado com sucesso!']);
        }

    } else {
        echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
    }
} catch (PDOException $e) {
    // Verificando se possui erro de chave única (e-mail)
    if ($e->getCode() === '23000') {
        echo json_encode(['success' => false, 'message' => 'Este e-mail já está cadastrado.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
    }
    exit;
}