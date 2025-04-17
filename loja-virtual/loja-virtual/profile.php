<?php
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Loja Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Loja Virtual</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5 pt-5">
        <h2>Seu Perfil</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informações Pessoais</h5>
                <p><strong>Nome de Usuário:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <a href="dashboard.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Loja Virtual. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>