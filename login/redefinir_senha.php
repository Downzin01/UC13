<?php
// Conexão com o banco
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

// Verifica se o id_usuario foi passado pela URL
if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
} else {
    // Caso não tenha o id_usuario, redireciona para a página de login
    header("Location: index.php");
    exit();
}

$erro = '';
$sucesso = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        $erro = "As senhas não coincidem!";
    } else {
        // Atualiza a senha no banco
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $updateSenha = 'UPDATE tb_usuario SET senha = :senha WHERE id_pessoa = :id_usuario';
        $stmt = $banco->prepare($updateSenha);
        $stmt->execute([
            ':senha' => $senha_hash,
            ':id_usuario' => $id_usuario
        ]);

        $sucesso = "Senha atualizada com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Redefinir Senha</h2>

        <?php if ($erro): ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="alert alert-success">
                <?= $sucesso ?>
            </div>
            <a href="login.php" class="btn btn-primary">Voltar para o Login</a>
        <?php else: ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="senha" class="form-label">Nova Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Redefinir Senha</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
