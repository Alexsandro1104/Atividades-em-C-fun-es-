<?php

//testar conexao com o banco de dados
//include_once (__DIR__ . "/../../util/Connection.php");
//$conn = Connection::getConnection();
//print_r($conn);

include_once(__DIR__ . "/../../controller/AlunoController.php");
$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);






include_once(__DIR__ . "/../include/header.php");

?>


<h3>listagem de alunos</h3>


<a href="inserir.php" class="btn btn-primary">inserir</a>

<table class="table table-striped">

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>idade</th>
        <th>estrangeiro</th>
        <th>curso</th>
        <th></th>
        <th></th>
    </tr>

    <?php
    foreach ($alunos as $al): ?>

        <tr>
            <td><?= $al->getId() ?></td>
            <td><?= $al->getNome() ?></td>
            <td><?= $al->getIdade() ?></td>
            <td><?= $al->getEstrangeiroDesc() ?></td>
            <td><?= $al->getCurso() // metodo toString(curso)
                ?></td>
            <td>
                <a href="alterar.php?id=<?= $al->getId() ?>">
                    <img src="../../img/btn_editar.png">
                </a>
            </td>

            <td>
                <a href="excluir.php?id=<?= $al->getId() ?>" onclick="return confirm('Confirma a exclusao?')">
                    <img src="../../img/btn_excluir.png">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>



<?php
include_once(__DIR__ . "/../include/footer.php");

?>