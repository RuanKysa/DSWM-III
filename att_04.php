<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Cadastro de Alunos:</h2>
    <!-- <form method="POST">
        <input type="text" name="nome" placeholder="Nome do aluno" required>
        <input type="text" name="matricula" placeholder="matricula"  required>
        <input type="text" name="curso" placeholder="curso" required>
    
        <button type="submit" name="calcular">Cadastrar Aluno</button>
    </form> -->

</body>
</html>

<?php
    class CadastroAluno{
        private $nome;
        private $matricula;
        private $curso;
    
    
        public function __construct($nome, $matricula, $curso) {
            $this->nome = $nome;
            $this->matricula = $matricula;
            $this->curso = $curso;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getMatricula(){
            return $this->matricula;
        }
        public function getCurso(){
            return $this->curso;
        }

}
    $Aluno = new CadastroAluno("RUAN KYSA MENDES BUENO", 27092004, 'ENGENHARIA DE SOFTWARE');
        echo "Nome Do Aluno: " . $Aluno->getNome(). "<br/>";
        echo "Matricula Do Aluno: " . $Aluno->getMatricula(). "<br/>";
        echo "Curso Do Aluno: " . $Aluno->getCurso(). "<br/>";
    
?>