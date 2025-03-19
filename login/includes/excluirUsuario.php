<?php 
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['confirmar']) && $_GET['confirmar'] === 'true') {
        $id = $_GET['id_usuario'];

        // Exclui primeiro da tabela tb_usuario (chave estrangeira)
        $deleteUsuario = "DELETE FROM tb_usuario WHERE id_pessoa = :id";
        $stmt = $banco->prepare($deleteUsuario);
        $stmt->execute([':id' => $id]);

        // Agora exclui da tabela tb_pessoa
        $deletePessoa = "DELETE FROM tb_pessoa WHERE id = :id";
        $stmt = $banco->prepare($deletePessoa);
        $stmt->execute([':id' => $id]);

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            });
        </script>";
    }

} catch (PDOException $e) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            document.getElementById('errorMessage').textContent = '{$e->getMessage()}';
            myModal.show();
        });
    </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container text-center mt-5">
        <h2 class="text-danger">Deseja excluir este usuário?</h2>
        <div class="mt-4">
            <a href="deletar.php?confirmar=true&id_usuario=<?= $_GET['id_usuario'] ?>" class="btn btn-danger">Sim, excluir</a>
            <a href="page_lista.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>

    <!-- Modal de sucesso -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Sucesso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Usuário excluído com sucesso!
                </div>
                <div class="modal-footer">
                    <a href="page_lista.php" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de erro -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Erro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <span id="errorMessage"></span>
                </div>
                <div class="modal-footer">
                    <a href="page_lista.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
