<?php
    // Conexão com o banco de dados
    $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $banco = new PDO($dsn, $user, $password);

    // Verifica se o formulário de dados pessoais foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['ano_nascimento'], $_POST['cpf'])) {
        // Cadastro de dados pessoais
        $nome = $_POST['nome'];
        $ano_nascimento = $_POST['ano_nascimento'];
        $cpf = $_POST['cpf'];
        $telefone_1 = $_POST['telefone_1'];
        $telefone_2 = $_POST['telefone_2'];
        $logadrouro = $_POST['logradouro'];
        $n_casa = $_POST['n_casa'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];

        $insertPessoa = 'INSERT INTO tb_pessoa (nome, ano_nascimento, cpf, telefone_1, telefone_2, logradouro, n_casa, bairro, cidade) 
                        VALUE (:nome, :nasc, :cpf, :tel1, :tel2, :logr, :n_casa, :bairro, :cidade)';
        
        $bancoPreparado = $banco->prepare($insertPessoa);
        $bancoPreparado->execute([
            ':nome' => $nome,
            ':nasc' => $ano_nascimento,
            ':cpf' => $cpf,
            ':tel1' => $telefone_1,
            ':tel2' => $telefone_2,
            ':logr' => $logadrouro,
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
        
        $bancoPreparado = $banco->prepare($insertUsuario);
        $bancoPreparado->execute([
            ':user' => $user,
            ':senha' => $senha,  
            ':id_pessoa' => $id_pessoa
        ]);

        echo '<script">
                alert("Usuário Cadastrado com Sucesso!!!");
                window.location.replace("index.php");
            </script>';
        exit();
    }
?>

