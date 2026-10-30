<?php

include_once(__DIR__ . "/../Model/Aluno.php");


class AlunoService
{

    public function validar(Aluno $aluno)
    {

        $erro = array();

        if ($aluno->getNome() == null)
            array_push($erro, "informe o nome!");

        if ($aluno->getIdade() == null)
            array_push($erro, "informe a idade!");

        if ($aluno->getEstrangeiro() == null)
            array_push($erro, "informe se o aluno e estrangeiro!");

        if ($aluno->getCurso()->getId() == null)
            array_push($erro, "informe o curso!");

        return $erro;
    }
}
