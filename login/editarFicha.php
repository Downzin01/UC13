<?php
$id_usuario = $_GET['id_usuario'];

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = 'SELECT tb_pessoa.*, tb_usuario.usuario, tb_usuario.senha FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_pessoa.id = ' . $id_usuario;

$dados = $banco->query($select)->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se a senha foi modificada pelo usuário
    $senha = ($_POST['senha'] !== '') ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $dados['senha']; // Se a senha for em branco, mantém a original
    $telefone_1 = $_POST['telefone_1'];
    $telefone_2 = $_POST['telefone_2'];
    $logradouro = $_POST['logradouro'];
    $n_casa = $_POST['n_casa'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    // Atualizar a pessoa
    $updatePessoa = "UPDATE tb_pessoa SET telefone_1 = ?, telefone_2 = ?, logradouro = ?, n_casa = ?, bairro = ?, cidade = ? WHERE id = ?";
    $stmtPessoa = $banco->prepare($updatePessoa);
    $stmtPessoa->execute([$telefone_1, $telefone_2, $logradouro, $n_casa, $bairro, $cidade, $id_usuario]);

    // Atualizar o usuário (senha)
    $updateUsuario = "UPDATE tb_usuario SET senha = ? WHERE id_pessoa = ?";
    $stmtUsuario = $banco->prepare($updateUsuario);
    $stmtUsuario->execute([$senha, $id_usuario]);

    // Redirecionar após salvar
    header("Location: visualizar.php?id_usuario=$id_usuario");
    exit();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    form {
        width: 600px;
    }

    .form-control[disabled] {
        background-color: #f8f9fa;
    }
</style>

<main class="container">
    <form action="" method="POST">
        <!-- Nome do Usuário - Somente leitura -->
        <div class="row mt-2">
            <div class="col position-relative">
                <label for="usuario">Nome de Usuário</label>
                <input type="text" id="usuario" value="<?= $dados['usuario'] ?>" class="form-control" disabled>
            </div>
        </div>

        <!-- Senha - Exibir um aviso de senha atual e permitir alterar -->
        <div class="row mt-2">
            <div class="col position-relative">
                <label for="senha">Nova Senha</label>
                <div class="input-group">
                    <input type="password" id="senha" name="senha" class="form-control">
                    <button type="button" class="btn btn-outline-secondary" onclick="toggleSenha()">
                        <i id="icon-eye" class="bi bi-eye"></i>
                    </button>
                </div>
                <small>Deixe em branco se não quiser alterar a senha</small>
            </div>
        </div>

        <!-- Telefones - Campos editáveis -->
        <div class="row mt-2">
            <div class="col">
                <label for="telefone_1">Telefone 1</label>
                <input type="text" name="telefone_1" value="<?= $dados['telefone_1'] ?>" class="form-control">
            </div>
            <div class="col">
                <label for="telefone_2">Telefone 2</label>
                <input type="text" name="telefone_2" value="<?= $dados['telefone_2'] ?>" class="form-control">
            </div>
        </div>

        <!-- Endereço - Campos editáveis -->
        <div class="row mt-2">
            <div class="col-9">
                <label for="logradouro">Logradouro</label>
                <input type="text" name="logradouro" value="<?= $dados['logradouro'] ?>" class="form-control">
            </div>
            <div class="col-3">
                <label for="numero">Número</label>
                <input type="number" name="n_casa" value="<?= $dados['n_casa'] ?>" class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" value="<?= $dados['bairro'] ?>" class="form-control">
            </div>
            <div class="col">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" value="<?= $dados['cidade'] ?>" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</main>

<script>
    function toggleSenha() {
        var senhaInput = document.getElementById("senha");
        var icon = document.getElementById("icon-eye");
        
        if (senhaInput.type === "password") {
            senhaInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            senhaInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
