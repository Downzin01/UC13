<h1>Cadastro de Usuário</h1>
<form action="" method="POST">
    <input type="hidden" name="id_pessoa" value="<?= $_GET['id_pessoa'] ?>">

    <div class="mb-3">
        <label for="user" class="form-label">Nome de Usuário</label>
        <input type="text" name="user" id="user" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Confirmar Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>
</form>