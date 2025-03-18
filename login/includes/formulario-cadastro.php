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
    <?php if (!isset($_GET['id_pessoa'])): 
        include 'formulario-cadastroPessoa.php';
    ?>
    <?php else: 
        include 'formulario-cadastroUsuario.php';
    ?>
    <?php endif; ?>
</main>