<?php require_once "app/view/comuns/cabecalho.php" ?>

<?= cabecalho("Lista Departamento", "Departamento") ?>

<table id="tbListaDepartamentos" class="table table-bordered table-hover table-striped mt-3">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Descrição</th>
            <td>Status</td>
            <td>Opções</td>
        </tr>
    </thead>
    <tbody>
        <?php
            if (count($rows) > 0) {
                foreach ($rows as $value) {
                    ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['descricao'] ?></td>
                        <td><?= ($value['statusRegistro'] == 1 ? "Ativo" : "Inativo") ?></td>
                        <td>
                            <a href="/Departamento/form/view/<?= $value['id'] ?>" class="btn btn-secondary" title="Visualizar">Visualizar</a>
                            <a href="/Departamento/form/update/<?= $value['id'] ?>" class="btn btn-warning" title="Alteração">Alterar</a>
                            <a href="/Departamento/form/delete/<?= $value['id'] ?>" class="btn btn-danger" title="Exclusão">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">Nenhum registro encontrado...</td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<?= datatables("tbListaDepartamentos") ?>

<?php require_once "app/view/comuns/rodape.php" ?>