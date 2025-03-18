<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: "Poppins", sans-serif;
    }
    
    form {
        width: 500px;
    }
</style>
<body>
    <section class="card dflex justify-content-center align-items-center p-5">
        <h1>Login</h1>
        <form action="auxLogin.php" method="POST" class="mt-3">
            <label for="" class="form-label">Usuário:</label>
            <input type="text" name="user" class="form-control" placeholder="Email">

            <label for="" class="form-label">Senha:</label>
            <input type="password" name="password" class="form-control" placeholder="Senha">
            
            <div class="d-flex justify-content-center gap-3 p-3">
                <a href="esqueciMinhaSenha.php" class="">Esqueci minha senha</a>
                <a href="cadastrarUsuario.php" class="">Cadastrar Novo Usuário</a>
            </div>
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3 px-5">Login</button>
            </div>
        </form>
    </section>
</body>
</html>