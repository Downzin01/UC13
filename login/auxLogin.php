<?php

echo '<h1>Teste</h1>';

$userForm = $_POST['user'];
$passwordForm = $_POST['password'];

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

// Busca o usuário pelo nome de usuário
$consultaUsuarioSenha = 'SELECT * FROM tb_usuario WHERE usuario = ?';
$stmt = $banco->prepare($consultaUsuarioSenha);
$stmt->execute([$userForm]);
$resultado = $stmt->fetch();

if ($resultado && password_verify($passwordForm, $resultado['senha'])) {
    header('Location: loginSucesso.php');
} else {
    header('Location: index.php');
}
?>
