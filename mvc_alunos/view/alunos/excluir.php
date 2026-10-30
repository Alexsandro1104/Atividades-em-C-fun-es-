<?php

include_once(__DIR__ . "/../../controller/AlunoController.php");
//capturar o id do aluno para ser excluido

$id = 0;
if(isset($_GET["id"]))
    $id = $_GET["id"];


//validar se o id foi recebido

if(! $id){
    echo "ID invalido! <br>";
    echo "<a href='lista.php'>Voltar</a>";
}


//excluir o aluno
$alunoCont = new AlunoController();
$alunoCont->excluir($id);

header("location: listar.php");