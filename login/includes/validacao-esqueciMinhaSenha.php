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
            header("Location: page_redefinir_senha.php?id_usuario=$id_usuario");
            exit();
        } else {
            $erro = "Usuário ou CPF inválidos!";
        }
    }
?>