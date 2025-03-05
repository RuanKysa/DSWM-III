<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário PHP</title>
</head>

<body>
    <h2>Formulário</h2>
    <form method="post" action="">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars(string: $nome) ?>"><br/>
        Idade: <input type="number" name="idade" value="<?= htmlspecialchars(string: $idade) ?>"><br/>
        Comentário: <textarea name="comentario"><?= htmlspecialchars(string: $comentario) ?></textarea><br/>
        <input type="submit" value="Enviar">
    </form>

    <?php
    $nome = $idade = $comentario = "";
    $erro = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($erro)) {
        if (empty($_POST["nome"]) || empty($_POST["idade"]) || empty($_POST["comentario"])) {
            $erro = "Todos os campos são obrigatórios!";
        } else {
            $nome = htmlspecialchars(string: $_POST["nome"]);
            $comentario = htmlspecialchars(string: $_POST["comentario"]);

            if (!is_numeric(value: $_POST["idade"]) || $_POST["idade"] < 1 || $_POST["idade"] > 120) {
                $erro = "A idade deve ser um número entre 1 e 120!";
            } else {
                $idade = (int) $_POST["idade"];
            }
        }

        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($erro)) {
        echo "<h3>Dados Enviados:</h3>";
        echo "Nome: $nome <br>";
        echo "Idade: $idade <br>";
        echo "Comentário: $comentario <br>";
    }
    ?>
    <?php if (!empty($erro))
        echo "<p style='color:red;'>$erro</p>"; ?>

</body>

</html>