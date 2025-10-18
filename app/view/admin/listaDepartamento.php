<?php
    require_once "helper/crud.php";
    require_once "helper/utilits.php";
?>

<?= cabecalho("Lista Departamento", "Departamento") ?>

<table class="table table-bordered table-hover table-striped mt-3">
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
                            <a href="index.php?pagina=formDepartamento&action=view&id=<?= $value['id'] ?>" class="btn btn-secondary" title="Visualizar">Visualizar</a>
                            <a href="index.php?pagina=formDepartamento&action=update&id=<?= $value['id'] ?>" class="btn btn-warning" title="Alteração">Alterar</a>
                            <a href="index.php?pagina=formDepartamento&action=delete&id=<?= $value['id'] ?>" class="btn btn-danger" title="Exclusão">Excluir</a>
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