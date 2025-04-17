<?php
  require_once 'config.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = $_POST['password'];

      if ($username && $email && $password) {
          if (strlen($password) < 6) {
              $error = "A senha deve ter pelo menos 6 caracteres.";
          } else {
              $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
              $stmt->execute([$email, $username]);
              if ($stmt->fetch()) {
                  $error = "E-mail ou nome de usuário já cadastrado.";
              } else {
                  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                  $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                  if ($stmt->execute([$username, $email, $hashed_password])) {
                      header("Location: login.html?success=Cadastro realizado com sucesso! Faça login.");
                      exit;
                  } else {
                      $error = "Erro ao cadastrar. Tente novamente.";
                  }
              }
          }
      } else {
          $error = "Preencha todos os campos.";
      }

      // Redireciona de volta para register.html com mensagem de erro
      header("Location: register.html?error=" . urlencode($error));
      exit;
  }
  ?>