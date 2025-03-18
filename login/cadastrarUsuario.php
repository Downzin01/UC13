<?php
session_start();

// Conexão com o banco de dados
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

// Verifica se o formulário de dados pessoais foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['nasc'], $_POST['cpf'])) {
    // Cadastro de dados pessoais
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $cpf = $_POST['cpf'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $log = $_POST['log'];
    $n_casa = $_POST['n_casa'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $insertPessoa = 'INSERT INTO tb_pessoa (nome, ano_nascimento, cpf, telefone_1, telefone_2, logradouro, n_casa, bairro, cidade) 
                     VALUE (:nome, :nasc, :cpf, :tel1, :tel2, :logr, :n_casa, :bairro, :cidade)';
    
    $box = $banco->prepare($insertPessoa);
    $box->execute([
        ':nome' => $nome,
        ':nasc' => $nasc,
        ':cpf' => $cpf,
        ':tel1' => $tel1,
        ':tel2' => $tel2,
        ':logr' => $log,
        ':n_casa' => $n_casa,
        ':bairro' => $bairro,
        ':cidade' => $cidade
    ]);

    // Após inserir os dados pessoais, pega o ID gerado para essa pessoa
    $id_pessoa = $banco->lastInsertId();

    // Redireciona para o cadastro do usuário, passando o ID da pessoa
    header("Location: ?id_pessoa=$id_pessoa");
    exit();
}

// Verifica se o formulário de cadastro de usuário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'], $_POST['senha'], $_POST['id_pessoa'])) {
    // Cadastro de usuário
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    $id_pessoa = $_POST['id_pessoa'];

    // Insere o usuário na tabela tb_usuario
    $insertUsuario = 'INSERT INTO tb_usuario (usuario, senha, id_pessoa) VALUE (:user, :senha, :id_pessoa)';
    
    $box = $banco->prepare($insertUsuario);
    $box->execute([
        ':user' => $user,
        ':senha' => password_hash($senha, PASSWORD_DEFAULT),  // Hash da senha
        ':id_pessoa' => $id_pessoa
    ]);

    echo '<script>
            alert("Usuário Cadastrado com Sucesso!!!");
            window.location.replace("index.php");
          </script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<main class="container">
    <?php if (!isset($_GET['id_pessoa'])): ?>
        <!-- Etapa 1: Cadastro de dados pessoais -->
        <h1>Cadastro de Cliente</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nasc" class="form-label">Ano de Nascimento</label>
                <input type="number" name="nasc" id="nasc" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tel1" class="form-label">Telefone 1</label>
                <input type="text" name="tel1" id="tel1" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tel2" class="form-label">Telefone 2</label>
                <input type="text" name="tel2" id="tel2" class="form-control">
            </div>
            <div class="mb-3">
                <label for="log" class="form-label">Logradouro</label>
                <input type="text" name="log" id="log" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="n_casa" class="form-label">Número da Casa</label>
                <input type="number" name="n_casa" id="n_casa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Próxima Etapa</button>
        </form>
    <?php else: ?>
        <!-- Etapa 2: Cadastro de usuário -->
        <h1>Cadastro de Usuário</h1>
        <form action="" method="POST">
            <input type="hidden" name="id_pessoa" value="<?= $_GET['id_pessoa'] ?>">

            <div class="mb-3">
                <label for="user" class="form-label">Nome de Usuário</label>
                <input type="text" name="user" id="user" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>
        </form>
    <?php endif; ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
