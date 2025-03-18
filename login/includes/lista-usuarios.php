<?php
    $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $select = 'SELECT * FROM tb_usuario';

    $resultado = $banco->query($select)->fetchAll();
?>

<main class="container my-5">
    <table class="table table-striped">
        <tr>
            <td>ID</td>
            <td>Usuário</td>
            <td class="text-center">Ações</td>
        </tr>
        <?php foreach ($resultado as $linha) { ?>
            <tr>
                <td> <?= $linha['id'] ?> </td>
                <td> <?php echo $linha['usuario'] ?> </td>
                <td class="text-center">
                    <a href="./ficha.php?id_usuario=<?= $linha['id'] ?>" class="btn btn-primary">Abrir</a>
                    <a href="./editarFicha.php?id_usuario=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="./excluirFicha.php?id_usuario=<?= $linha['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>