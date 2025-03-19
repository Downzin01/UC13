<body>
    <div class="container mt-5">
        <h1>Cadastro Pessoal</h1>
        <form action="" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>

            <div class="row mt-2">
                <div class="col-4">
                    <label for="ano_nascimento">Ano de Nascimento</label>
                    <input type="text" name="ano_nascimento" id="ano_nascimento" class="form-control" required>
                </div>
                <div class="col-8">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="telefone_1">Telefone 1</label>
                    <input type="text" name="telefone_1" id="telefone_1" class="form-control" required>
                </div>
                <div class="col">
                    <label for="telefone_2">Telefone 2</label>
                    <input type="text" name="telefone_2" id="telefone_2" class="form-control">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-9">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" name="logradouro" id="logradouro" class="form-control" required>
                </div>
                <div class="col-3">
                    <label for="numero_casa">Número</label>
                    <input type="number" name="n_casa" id="n_casa" class="form-control">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control">
                </div>
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control">
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">Avançar</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#cpf').inputmask('999.999.999-99');
            $('#telefone_1, #telefone_2').inputmask('(99) 99999-9999');
            $('#ano_nascimento').inputmask('9999');
        });
    </script>
</body>
</html>
