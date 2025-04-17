<?php
  require_once 'config.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = $_POST['password'];

      if ($email && $password) {
          $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
          $stmt->execute([$email]);
          $user = $stmt->fetch();

          if ($user && password_verify($password, $user['password'])) {
              $_SESSION['user_id'] = $user['id'];
              $_SESSION['username'] = $user['username'];
              header("Location: dashboard.php");
              exit;
          } else {
              $error = "E-mail ou senha inválidos.";
          }
      } else {
          $error = "Preencha todos os campos.";
      }

      // Redireciona de volta para login.html com mensagem de erro
      header("Location: login.html?error=" . urlencode($error));
      exit;
  }
  ?>