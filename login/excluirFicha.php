<?php 
echo '<h1>Deletar Usuário</h1>';

// Configuração da conexão com o banco
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    // Conexão com o banco de dados
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Para capturar erros de execução
    
    // Verifica se o id_usuario foi passado na URL
    if (isset($_GET['id_usuario'])) {
        $id = $_GET['id_usuario'];
        
        // Inicia uma transação para garantir a consistência
        $banco->beginTransaction();

        // Exclui o usuário da tabela tb_usuario
        $deleteUsuario = "DELETE FROM tb_usuario WHERE id_pessoa = :id";
        $stmtUsuario = $banco->prepare($deleteUsuario);
        $stmtUsuario->execute([':id' => $id]);

        // Exclui o usuário da tabela tb_pessoa
        $deletePessoa = "DELETE FROM tb_pessoa WHERE id = :id";
        $stmtPessoa = $banco->prepare($deletePessoa);
        $stmtPessoa->execute([':id' => $id]);

        // Se tudo correu bem, confirma a transação
        $banco->commit();

        // Mensagem de sucesso
        echo '<script> 
                alert("Usuário excluído com sucesso!");
                window.location.replace("lista.php");
              </script>';
    } else {
        echo '<script> 
                alert("ID do usuário não fornecido.");
                window.location.replace("lista.php");
              </script>';
    }

} catch (Exception $e) {
    // Em caso de erro, reverte a transação
    $banco->rollBack();
    echo '<script> 
            alert("Erro ao excluir usuário: ' . $e->getMessage() . '");
            window.location.replace("lista.php");
          </script>';
}
?>
