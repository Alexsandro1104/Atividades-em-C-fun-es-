<?php

include_once(__DIR__ . "/../../model/Aluno.php");
include_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;

if (isset($_POST['nome'])) {
    //capturar os dados do usuario depois de clicado

    $id  = $_POST['id'];
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : null;
    $idade = is_numeric($_POST["idade"]) ? $_POST["idade"] : null;
    $estrang = trim($_POST["estrangeiro"]) ? trim($_POST["estrangeiro"]) : null;
    $idCurso = is_numeric($_POST["id_curso"]) ? $_POST["id_curso"] : null;

    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setId($id);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);

    $alunoCont = new AlunoController();
    $erros = $alunoCont->alterar($aluno);


    if (empty($erros)) {
        header("location: listar.php");
        exit;
    } else

        $msgErro = implode("<br>", $erros);
} else {
    //Apenas entrou na interface para realizar a alteração

    //1- Capturar o ID do aluno a ser alterado
    $id = 0;
    if (isset($_GET["id"]))
        $id = $_GET["id"];

    //2- Validar se o ID foi recebido
    if (! $id) {
        echo "ID inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

    //- 3- Carregar os dados do aluno
    $alunoCont = new AlunoController;
    $aluno = $alunoCont->buscarPorId($id);

    if (! $aluno) {
        echo "nenhum aluno encontrado para o ID! <br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

//Incluiro o formulário
include_once(__DIR__ . "/form.php");
