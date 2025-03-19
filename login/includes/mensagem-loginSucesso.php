<?php
    $redirectTime = 3; 
    $redirectURL = "../page_lista.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Bem-Sucedido</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="d-flex justify-content-center align-items-center vh-100 bg-dark text-white">
        <div class="text-center">
            <div class="spinner-border text-light" role="status" style="width: 4rem; height: 4rem;"></div>
            <h2 class="mt-3">Login realizado com sucesso!</h2>
            <p class="lead">Aguarde enquanto redirecionamos você para o painel...</p>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "<?php echo $redirectURL; ?>";
            }, <?php echo $redirectTime * 1000; ?>);
        </script>
    </body>
</html>
