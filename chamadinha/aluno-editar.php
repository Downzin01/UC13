<?php
    echo '<h1>Cadastro de Alunos</h1>';
    echo '<pre>';

    var_dump($_POST);

    $nomeFormulario      = $_POST["nome"];
    $telefoneFormulario  = $_POST["tel"];
    $emailFormulario     = $_POST["email"];
    $nascFormulario      = $_POST["nasc"];
    $frequenteFormulario = $_POST["frequente"];
    $imagemFormulario    = $_POST["img"];
    $id_aluno            = $_POST["id"];

    $dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $update = "UPDATE tb_alunos SET nome = :nome WHERE id = :id";
    $updatePreparado = $banco->prepare($update);
    $updatePreparado->execute([
        ':id' => $id_aluno
    ]);

    $updateInfo = "UPDATE tb_info_alunos SET telefone = :telefone, email = :email, nascimento = :nascimento, frequente = :frequente, img = :img WHERE id_alunos = :id_alunos";
    $updateInfoPreparado = $banco->prepare($updateInfo);
    $updatePreparado->execute([
        ':id_alunos' => $id_aluno
    ]);
