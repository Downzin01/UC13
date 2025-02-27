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

    $dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);
    $id_aluno = $banco->lastInsertId();
    
    $insert = "INSERT INTO tb_alunos(nome) VALUES(:nome);";
    $insertInfo = "INSERT INTO tb_info_alunos(telefone, email, nascimento, frequente, id_alunos, img) VALUES (:telefone, :email, :nascimento, :frequente, :id_alunos, :img);";

    $insertPreparado = $banco->prepare($insert);
    $insertInfoPreparado = $banco->prepare($insertInfo);

    $insertPreparado->execute([
        ':nome' => $nomeFormulario
    ]);

    $insertInfoPreparado->execute([
        ':telefone'   => $telefoneFormulario,
        ':email'      => $emailFormulario,
        ':nascimento' => $nascFormulario,
        ':frequente'  => $frequenteFormulario,
        ':id_alunos'  => $id_aluno,
        ':img'        => $imagemFormulario,
    ]);

