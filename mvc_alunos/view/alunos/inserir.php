<?php

include_once(__DIR__ . "/../../Model/Aluno.php");
include_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;


if (isset($_POST["nome"])) {
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : null;
    $idade = is_numeric($_POST["idade"]) ? $_POST["idade"] : null;
    $estrang = trim($_POST["estrangeiro"]) ? trim($_POST["estrangeiro"]) : null;
    $idCurso = is_numeric($_POST["id_curso"]) ? $_POST["id_curso"] : null;

    $aluno = new Aluno();
    $aluno->setId(0);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);

    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);


    if(empty($erros)){
        header("location: listar.php");
        exit;
    }else

    $msgErro = implode("<br>", $erros);
}

include_once(__DIR__ . "/form.php");
