<?php
    $id_aluno = $_GET['id_aluno'];

    $dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos = ' . $id_aluno;

    $dados = $banco->query($select)->fetch();
    
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
    }

</style>
<body>
    <main class="container d-flex justify-content-center align-items-center gap-3" style="height: 100dvh;">
        <div class="col d-flex justify-content-center">
            <img src="./img/<?= $dados['img'] ?>" style="width: 50%;" id="imagemPreview">
        </div>
        <div class="col">
            <h1>Formulário Pamonha</h1>
            <form action="./aluno-editar.php" method="POST">
                <input type="hidden" name="id" value="<?= $dados['id']?>">
                <input type="text" name="nome" placeholder="nome" value="<?= $dados['nome'] ?>">
                <input type="number" name="tel" placeholder="telefone" value="<?= $dados['telefone'] ?>">
                <input type="email" name="email" placeholder="email" value="<?= $dados['email'] ?>">
                <input type="date" name="nasc" placeholder="nascimento" value="<?= $dados['nascimento'] ?>">
                <div>
                    <input type="checkbox" name="frequente" value="<?= $dados['frequente'] ?>" <?= ($dados['frequente'] == 1) ? 'checked' : ""; ?>>
                    <label for="">Frequente?</label>
                </div>
                <input type="file" name="img" accept="image/*" id="imagemInput">
                <input type="submit">
            </form>
        </div>     
    </main>
    <script>
        const inputUpload = document.getElementById("imagemInput");
        const imagemPrincipal = document.querySelector("#imagemPreview");

        inputUpload.addEventListener("change", async (evento) => {
            const arquivo = evento.target.files[0];

            if (arquivo) {
                try {
                    const conteudoDoArquivo = await lerConteudoDoArquivo(arquivo);
                    imagemPrincipal.src = conteudoDoArquivo.url;
                } catch (erro) {
                    console.error("Erro na leitura do arquivo", erro);
                }
            }
        });

        function lerConteudoDoArquivo(arquivo) {
            return new Promise((resolve, reject) => {
                const leitor = new FileReader();
                leitor.onload = () => {
                    resolve({url: leitor.result, nome: arquivo.name});
                }

                leitor.onerror = () => {
                    reject(`Erro na leitura do arquivo ${arquivo.name}`);
                }

                leitor.readAsDataURL(arquivo);
            })
        }
    </script>
</body>
</html>