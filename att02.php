<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h2>Cadastro de Notas:</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do aluno" required>
        <input type="number" name="nota1" placeholder="Nota 1" step="0.01" required>
        <input type="number" name="nota2" placeholder="Nota 2" step="0.01" required>
        <input type="number" name="nota3" placeholder="Nota 3" step="0.01" required>
        <button type="submit" name="calcular">Calcular Média</button>
    </form>
    <!-- 1) -->
    <?php
    if (isset($_POST['calcular'])) {
        $nome = $_POST['nome'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        
        $media = ($nota1 + $nota2 + $nota3) / 3;
        $situacao = $media >= 7 ? "Aprovado" : ($media >= 5 ? "Recuperação" : "Reprovado");
        
        echo "<h3>Aluno: $nome</h3>";
        echo "<h3>Média: " . number_format($media, 2) . "</h3>";
        echo "<h3>Situação: $situacao</h3>";
    }
    ?>
</body>

</html>
