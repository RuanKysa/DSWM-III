<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>

<body>
    <h2>Cadastro de Alunos:</h2>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do aluno" required>
        <input type="text" name="matricula" placeholder="Matrícula" required>
        <input type="text" name="curso" placeholder="Curso" required>
        <button type="submit" name="cadastrar">Cadastrar Aluno</button>
    </form>

    <h3>Alunos Cadastrados:</h3>
    <ul>
        <?php
        class Aluno
        {
            private $nome;
            private $matricula;
            private $curso;

            public function __construct($nome, $matricula, $curso)
            {
                $this->nome = $nome;
                $this->matricula = $matricula;
                $this->curso = $curso;
            }

            public function getNome()
            {
                return $this->nome;
            }

            public function getMatricula()
            {
                return $this->matricula;
            }

            public function getCurso()
            {
                return $this->curso;
            }
        }

        class CadastroAlunos
        {
            private $alunos = [];

            public function cadastrarAluno($aluno)
            {
                $this->alunos[] = $aluno;
            }

            public function listarAlunos()
            {
                foreach ($this->alunos as $aluno) {
                    echo "<li>" . $aluno->getNome() . " - " . $aluno->getMatricula() . " - " . $aluno->getCurso() . "</li>";
                }
            }

            public function verificarMatriculaUnica($matricula)
            {
                foreach ($this->alunos as $aluno) {
                    if ($aluno->getMatricula() == $matricula) {
                        return false;
                    }
                }
                return true;
            }
        }

        $cadastro = new CadastroAlunos();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
            $nome = $_POST['nome'];
            $matricula = $_POST['matricula'];
            $curso = $_POST['curso'];
            if ($cadastro->verificarMatriculaUnica($matricula)) {
                $aluno = new Aluno($nome, $matricula, $curso);
                $cadastro->cadastrarAluno($aluno);
                echo "<p>Aluno cadastrado com sucesso!</p>";
            } else {
                echo "<p>Erro: A matrícula já está cadastrada.</p>";
            }
        }
        $cadastro->listarAlunos();
        ?>
    </ul>

</body>

</html>