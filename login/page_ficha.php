<?php
$id_usuario = $_GET['id_usuario'];


$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = 'SELECT tb_pessoa.*, tb_usuario.usuario FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_pessoa.id = ' . $id_usuario;

$dados = $banco->query($select)->fetch();

?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    img {
        width: 200px;
        object-fit: cover;
    }
</style>
<main class="container ">
    <form action="#">
        

        <label for="nome">Nome</label>
        <input type="text" value="<?= $dados['nome'] ?>" disabled class="form-control">

        <div class="row mt-2">
            <div class="col-4">
                <label for="ano_nascimento">Ano de Nascimento</label>
                <input type="number" value="<?php echo $dados['ano_nascimento'] ?>" disabled class="form-control">
            </div>
            <div class="col-8">
                <label for="cpf">CPF</label>
                <input type="text" value="<?= $dados['cpf'] ?>" disabled class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <label for="telefone_1">Telefone 1</label>
                <input type="text" value="<?php echo $dados['telefone_1'] ?>" disabled class="form-control">
            </div>
            <div class="col">
                <label for="telefone_2">Telefone 2</label>
                <input type="text" value="<?php echo $dados['telefone_2'] ?>" disabled class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-9">
                <label for="logradouro">logradouro</label>
                <input type="text" value="<?php echo $dados['logradouro'] ?>" disabled class="form-control">
            </div>
            <div class="col-3">
                <label for="numero">Número</label>
                <input type="number" value="<?php echo $dados['n_casa'] ?>" disabled class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Bairro</label>
                <input type="text" value="<?php echo $dados['bairro'] ?>" disabled class="form-control">
            </div>
            <div class="col">
                <label for="data_nascimento">Cidade</label>
                <input type="text" value="<?php echo $dados['cidade'] ?>" disabled class="form-control">
            </div>

            <div class="d-flex justify-content-center mt-3">
                <a href="page_lista.php" class="btn btn-primary">Voltar</a>
                <a href="page_editarUsuario.php?id_usuario=<?= $id_usuario ?>" class="btn btn-warning ms-3">Editar</a>
                <a href="./includes/excluirUsuario.php?id_usuario=<?= $id_usuario ?>" class="btn btn-danger ms-3">Excluir</a>
            </div>
        </div>
    </form>
</main>