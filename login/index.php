<?php include 'includes/header.php'; ?>

<section class="card dflex justify-content-center align-items-center p-5">
    <h1>Login</h1>
    <form action="validacao-login.php" method="POST" class="mt-3">
        <label for="" class="form-label">Usuário:</label>
        <input type="text" name="user" class="form-control mb-3" placeholder="Usuário" required>

        <label for="" class="form-label">Senha:</label>
        <div class="input-group">
            <input type="password" id="senha" name="password" class="form-control" placeholder="Senha" required>
            <button type="button" class="btn btn-outline-secondary" onclick="toggleSenha()">
                <i id="icon-eye" class="bi bi-eye"></i>
            </button>
        </div>
        
        <div class="d-flex justify-content-center gap-3 p-3">
            <a href="page_esqueciMinhaSenha.php" class="">Esqueci minha senha</a>
            <a href="page_cadastro.php" class="">Cadastrar Novo Usuário</a>
        </div>
        
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mt-3 px-5">Login</button>
        </div>
    </form>
</section>

<?php include 'includes/footer.php'; ?>
