<?php
    echo '<h1>Aluno-deletar.php';

    $dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $id_aluno = $_GET['id'];

    // Apagando aluno na tb_alunos
    $delete = "DELETE FROM tb_alunos WHERE id = :id";
    $deletePreparado = $banco->prepare($delete);
    $deletePreparado->execute([
        ':id' => $id_aluno
    ]);

    // Apagando info do aluno na tb_info_alunos
    $deleteInfo = "DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos";
    $deleteInfoPreparado = $banco->prepare($deleteInfo);
    $deleteInfoPreparado->execute([
        ':id_alunos' => $id_aluno
    ]);

    echo '<script>alert("Usuário apagado com Sucesso")</script>';

    var_dump($deletePreparado);