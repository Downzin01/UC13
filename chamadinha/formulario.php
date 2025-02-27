<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
    }

    .container {
        padding: 20%;
    }

</style>
<body>
    <main class="container">
        <h1>Formulário Pamonha</h1>
        <form action="./aluno-cadastrar.php" method="POST">
            <input type="text" name="nome" placeholder="nome">
            <input type="number" name="tel" placeholder="telefone">
            <input type="email" name="email" placeholder="email">
            <input type="date" name="nasc" placeholder="nascimento">
            <div>
                <input type="checkbox" name="frequente">
                <label for="">Frequente?</label>
            </div>
            <input type="file" name="img" accept="image/*">
            <input type="submit">
        </form>
    </main>
</body>
</html>