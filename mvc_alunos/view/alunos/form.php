<?php

//carregar a lista de curso
include_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);


//cabecalho do arquivo
include_once(__DIR__ . "/../include/header.php");

?>

<h4><?= $aluno && $aluno->getId() > 0 ? "Alterar" : "Inserir"  ?> Aluno</h4>

<div class="row">

    <div class="col-6">


        <form action="" method="post">

            <div>

                <label for="nome" class="form-label">nome</label>
                <input type="text" name="nome"
                    id="nome" placeholder="informe o nome"
                    value="<?= $aluno ? $aluno->getNome() : '' ?>"
                    class="form-control">

            </div>

            <br>

            <div>

                <label for="idade" class="form-labe">idade</label>
                <input type="number" id="idade"
                    name="idade" placeholder="informe a idade"
                    value="<?= $aluno ? $aluno->getIdade() : '' ?>"
                    class="form-control">

            </div>

            <br>

            <div>

                <label class="form-label" for="estrangeiro">estrangeiro</label>
                <select class="form-control" name="estrangeiro" id="estrangeiro">
                    <option value="">selecione</option>
                    <option value="S" <?= $aluno && $aluno->getEstrangeiro() == 'S' ? "selected" : "" ?>>sim</option>
                    <option value="N" <?= $aluno && $aluno->getEstrangeiro() == 'N' ? "selected" : "" ?>>nao</option>
                </select>

            </div>

            <br>

            <div>

                <label class="form-label" for="id_curso">curso</label>
                <select class="form-control" name=" id_curso" id="id_curso">
                    <option value="">selecione</option>

                    <!-- opcoes geradas de formas dinamicas -->
                    <?php foreach ($cursos as $c): ?>

                        <option value="<?= $c->getId() ?>"

                            <?php if ($aluno && $aluno->getCurso()->getId() == $c->getId())
                                echo "selected";

                            ?>><?= $c ?></option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div>

                <input type="hidden" name="id" value="<?= $aluno ? $aluno->getId() : 0 ?>">

            </div>

            <br>

            <div>
                <button class="btn btn-primary">Gravar</button>
            </div>

            <br>

        </form>
    </div>

    <div class="col-6">

        <?php if ($msgErro): ?>

            <div class="alert alert-danger">
                <?= $msgErro ?> 
        
            </div>

        <?php endif; ?>
    </div>

</div>


<a href="listar.php" class="btn btn-primary">voltar</a>


<?php
include_once(__DIR__ . "/../include/footer.php");

?>