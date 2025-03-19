<?php
    $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $select = 'SELECT * FROM tb_usuario';

    $resultado = $banco->query($select)->fetchAll();
?>


<section class="container d-flex justify-content-space-between my-5">
    <table class="table table-striped">
        <tr>
            <td>ID</td>
            <td>Usuário</td>
            <td class="text-center col-3">Ações</td>
        </tr>
        <?php foreach ($resultado as $linha) { ?>
            <tr>
                <td> <?= $linha['id'] ?> </td>
                <td> <?php echo $linha['usuario'] ?> </td>
                <td class="text-center">
                    <a href="./page_ficha.php?id_usuario=<?= $linha['id'] ?>" class="btn btn-primary">Abrir</a>
                    <a href="./page_editarUsuario.php?id_usuario=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="./includes/excluirUsuario.php?id_usuario=<?= $linha['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>