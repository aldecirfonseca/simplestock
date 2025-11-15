<?php require_once "app/view/comuns/cabecalho.php" ?>

<?= cabecalho("Lista Movimetação", "Movimentacao") ?>

<table id="tbListaMovimentacao" class="table table-bordered table-hover table-striped mt-3">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Data Movimento</th>
            <th>Tipo</th>
            <td>Usuário</td>
            <td>Produto</td>
            <td>Quantidade</td>
            <td>Preço Unitário</td>
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
                        <td><?= date("d/m/Y", strtotime($value['data_movimento'])) . '<br>' . date("H:i:s", strtotime($value['data_movimento'])) ?></td>
                        <td><?= ($value['tipo'] == 1 ? "Entrada" : "Saída") ?></td>
                        <td><?= $value['nomeUsuario'] ?></td>
                        <td><?= $value['descricaoProduto'] ?></td>
                        <td><?= formatoValor($value['quantidade'], 3) ?></td>
                        <td><?= formatoValor($value['valorUnitario']) ?></td>
                        <td>
                            <a href="/Movimentacao/form/view/<?= $value['id'] ?>" class="btn btn-secondary" title="Visualizar">Visualizar</a>
                            <a href="/Movimentacao/form/update/<?= $value['id'] ?>" class="btn btn-warning" title="Alteração">Alterar</a>
                            <a href="/Movimentacao/form/delete/<?= $value['id'] ?>" class="btn btn-danger" title="Exclusão">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Nenhum registro encontrado...</td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<?= datatables("tbListaMovimentacao") ?>

<?php require_once "app/view/comuns/rodape.php" ?>