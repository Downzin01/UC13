<?php
    $id_usuario = $_GET['id_usuario'];

    $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $select = 'SELECT tb_pessoa.*, tb_usuario.usuario, tb_usuario.senha FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_pessoa.id = ' . $id_usuario;

    $dados = $banco->query($select)->fetch();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $user = $_POST['usuario'];
        $pass = $_POST ['senha'];

    $update = 'UPDATE tb_usuario SET usuario = :user, senha = :pass WHERE id_pessoa = :id';

    $box = $banco->prepare($update);

    $box->execute([ 
        ':id' => $id,
        ':user' => $user,
        ':pass' => $pass,
    ]);


    $nome = $_POST['nome'];
    $nasc = $_POST['ano_nascimento'];
    $cpf = $_POST['cpf'];
    $tel1 = $_POST['telefone_1'];
    $tel2 = $_POST['telefone_2'];
    $lograd = $_POST['logradouro'];
    $n_casa = $_POST['n_casa'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $update = 'UPDATE tb_pessoa SET nome = :nome, ano_nascimento = :ano_nascimento, cpf = :cpf, telefone_1 = :telefone_1, telefone_2 = :telefone_2, logradouro = :logradouro, n_casa = :n_casa, bairro = :bairro, cidade = :cidade WHERE id = :id' ;

    $box = $banco->prepare($update);

    $box->execute([ 
        ':id' => $id,
        ':nome' => $nome,
        ':ano_nascimento' => $nasc,
        ':cpf' => $cpf,
        ':telefone_1' => $tel1,
        ':telefone_2' => $tel2,
        ':logradouro' => $lograd,
        ':n_casa' => $n_casa,
        ':bairro' => $bairro,
        ':cidade' => $cidade,
        
    ]);

    // Redirecionar após salvar
    header("Location: ficha.php?id_usuario=$id_usuario");
    exit();
}
?>

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
    <form action="validacao-editarUsuario.php" method="POST">
        <input type="hidden" value="<?php echo $id_alunos ?>" name="id">
        <!-- Nome do Usuário - Somente leitura -->
        <div class="row mt-2">
            <div class="col position-relative">
                <label for="usuario">Nome de Usuário</label>
                <input type="text" name="nome" id="usuario" value="<?= $dados['usuario'] ?>" class="form-control" disabled>
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
        <div class="d-flex justify-content-center mt-3 gap-3">
            <a href="page_lista.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</main>