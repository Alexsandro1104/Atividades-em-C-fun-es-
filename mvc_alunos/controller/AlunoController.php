<?php

include_once(__DIR__ . "/../dao/AlunoDAO.php");
include_once(__DIR__ . "/../Model/Aluno.php");
include_once(__DIR__ . "/../service/AlunoService.php");

class AlunoController
{
    private AlunoDAO $alunoDAO;
    private AlunoService $aluno_service;

    public function __construct()
    {
        $this->alunoDAO = new AlunoDAO();
        $this->aluno_service = new AlunoService();
    }

    public function listar() {
        return $this->alunoDAO->listar();
    }

    public function buscarPorId($id): ?Aluno {

    return  $this->alunoDAO->buscarPorId($id);

    }
    public function inserir(Aluno $aluno) {

        $erros = $this ->aluno_service->validar($aluno);

        if(empty($erros)){
            $msgErro = $this->alunoDAO->inserir($aluno);
            if($msgErro)
                array_push($erros, $msgErro);

       
        }

        return $erros;
    }

        public function alterar(Aluno $aluno) {

        $erros = $this ->aluno_service->validar($aluno);

        if(empty($erros)){
            $msgErro = $this->alunoDAO->alterar($aluno);
            if($msgErro)
                array_push($erros, $msgErro);

       
        }

        return $erros;


    
    }

    public function excluir(int $idAluno){
        $this->alunoDAO->excluir($idAluno);
    }
}
?>
