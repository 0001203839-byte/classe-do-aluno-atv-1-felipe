<?php

class ClasseAluno
{   
        private string $nome;
        private int $idade;
        private string $curso;
        private bool $matriculado;
        private float $nota1;
        private float $nota2;

        public function __construct (string $nome, int $idade, string $curso)
        {
            $this ->nome = $nome;
            $this ->idade = $idade;
            $this ->curso = $curso;
            $this ->matriculado = false;
            $this ->nota1 = 0.0;
            $this ->nota2 = 0.0;

        }
        public function getNome(): string { return $this->nome; }
        public function getIdade(): int { return $this->idade; }
        public function getCurso(): string { return $this->curso; }
        public function getMatriculado(): bool { return $this->matriculado; }
        public function getNota1(): float { return $this->nota1; }
        public function getNota2(): float { return $this->nota2; }

        public function setNome(string $nome): void { $this->nome = $nome; }
        public function setIdade(int $idade): void { $this->idade = $idade; }
        public function setCurso(string $curso): void { $this->curso = $curso; }
        public function setMatriculado(bool $matriculado): void { $this->matriculado = $matriculado; }
        public function setNota1(float $nota1): void { $this->nota1 = $nota1; }
        public function setNota2(float $nota2): void { $this->nota2 = $nota2; }

        public function matricular(): void
    {
        if ($this->matriculado == true) {
            echo "O aluno já está matriculado.<br>";
            return;
        }
        $this->matriculado = true;
        echo "Aluno matriculado com sucesso!<br>";
        }
        public function cancelarMatricula(): void
        {
            if ($this->matriculado == false) {
            echo "Aluno já está com matrícula inativa.<br>";
            return;
        }
            $this->matriculado = false;
            echo "Matrícula cancelada.<br>";
        }
        public function verificarMaioridade(): string
        {
            if ($this->idade < 18) {
            return "Aluno é menor de idade.";
        }
            return "Aluno é maior de idade e pode participar de cursos noturnos.";
        }
        public function cadastrarNotas(float $n1, float $n2): void
        {
        $this->nota1 = $n1;
        $this->nota2 = $n2;
        echo "Notas cadastradas: " . $n1 . " e " . $n2 . ".<br>";
        }
         public function calcularMedia(): float
        {
        if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "Notas ainda não cadastradas.<br>";
            return 0.0;
        }
        $media = ($this->nota1 + $this->nota2) / 2;
        return $media;
        }
    public function verificarAprovacao(): void
        {
        if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "Notas não cadastradas.<br>";
            return;
        }
        $media = $this->calcularMedia();

        if ($media >= 7.0) {
            echo "Aprovado<br>";
        } else {
            echo "Reprovado<br>";
        }
        }
        public function exibirInformacoes(): void
        {
        $situacao = $this->matriculado ? "Matriculado" : "Não matriculado";
        echo "======== Dados do Aluno ========<br>";
        echo "Nome: " . $this->nome . "<br>";
        echo "Idade: " . $this->idade . "<br>";
        echo "Curso: " . $this->curso . "<br>";
        echo "Situação: " . $situacao . "<br>";
        echo "Nota 1: " . number_format($this->nota1, 2, ',', '.') . "<br>";
        echo "Nota 2: " . number_format($this->nota2, 2, ',', '.') . "<br>";
        if ($this->nota1 != 0.0 || $this->nota2 != 0.0) {
            $media = ($this->nota1 + $this->nota2) / 2;
            echo "Média: " . number_format($media, 2, ',', '.') . "<br>";
        }
        echo "<br>";
        }
    }
        $aluno1 = new ClasseAluno("Felipe", 19, "Criação de robos autonômos de limpeza");
        $aluno1->matricular();  
        $aluno1->cadastrarNotas(7.5, 8.5);
        $aluno1->exibirInformacoes();
        $mediaFinal = $aluno1->calcularMedia();
        echo "Média final: " . number_format($mediaFinal, 2, ',', '.') . "<br>";
        $aluno1->verificarAprovacao();
        echo $aluno1->verificarMaioridade() . "<br><br>";
        $aluno1->cancelarMatricula();
        $aluno1->cancelarMatricula();
        echo "<br>";
        $aluno1->exibirInformacoes();

?>
 