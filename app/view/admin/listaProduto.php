<?php require_once "app/view/comuns/cabecalho.php" ?>

<?= cabecalho("Lista Produto", "Produto") ?>

<table class="table table-bordered table-hover table-striped mt-3" id="tbListaProduto">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Descrição</th>
            <th>Departamento</th>
            <th>Saldo em Estoque</th>
            <th>Preço de Venda</th>
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
                        <td><?= $value['descricaoDepartamento'] ?></td>
                        <td class="text-end"><?= formatoValor($value['saldoEmEstoque'], 3) ?></td>
                        <td class="text-end"><?= formatoValor($value['precoVenda']) ?></td>
                        <td><?= ($value['statusRegistro'] == 1 ? "Ativo" : "Inativo") ?></td>
                        <td>
                            <a href="/Produto/form/view/<?= $value['id'] ?>" class="btn btn-secondary" title="Visualizar">Visualizar</a>
                            <a href="/Produto/form/update/<?= $value['id'] ?>" class="btn btn-warning" title="Alteração">Alterar</a>
                            <a href="/Produto/form/delete/<?= $value['id'] ?>" class="btn btn-danger" title="Exclusão">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="7">Nenhum registro encontrado...</td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<?= datatables("tbListaProduto") ?>

<?php require_once "app/view/comuns/rodape.php" ?>