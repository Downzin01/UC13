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

    .form-control[disabled] {
        background-color: #f8f9fa;
    }
</style>
<main class="container">
    <h2>Esqueci Minha Senha</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="usuario" class="form-label">Nome de Usuário</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>
        <?php if ($erro): ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Validar</button>
    </form>
</main>