<?php
// Conexão com o banco
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

$erro = ''; // Variável para armazenar erros de validação

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario']) && isset($_POST['cpf'])) {
    $usuario = $_POST['usuario'];
    $cpf = $_POST['cpf'];

    // Verifica se o nome de usuário e CPF estão no banco
    $selectUsuario = 'SELECT * FROM tb_usuario u
                      INNER JOIN tb_pessoa p ON u.id_pessoa = p.id
                      WHERE u.usuario = :usuario AND p.cpf = :cpf';
    $stmt = $banco->prepare($selectUsuario);
    $stmt->execute([':usuario' => $usuario, ':cpf' => $cpf]);
    $usuarioExistente = $stmt->fetch();

    if ($usuarioExistente) {
        // Se encontrado, libera a tela para redefinir a senha
        $id_usuario = $usuarioExistente['id_pessoa'];
        header("Location: redefinir_senha.php?id_usuario=$id_usuario");
        exit();
    } else {
        $erro = "Usuário ou CPF inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci Minha Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Esqueci Minha Senha</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nome de Usuário</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" required>
            </div>
            <?php if ($erro): ?>
                <div class="alert alert-danger">
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Validar</button>
        </form>
    </div>
</body>
</html>
