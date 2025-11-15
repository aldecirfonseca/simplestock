<?php require_once "app/view/comuns/cabecalho.php" ?>

<?= cabecalho("Movimentação", "Movimentacao") ?>

<form method="POST" action="/Movimentacao/<?= $action ?>">

    <input type="hidden" name="id" id="id" 
        value="<?= (isset($dados['id']) ? $dados['id'] : "") ?>">

    <div class="row mb-3">
        <div class="col-6 col-sm-3">
            <label for="data_movimento" class="form-label">Data/Hora</label>
            <input type="datetime-local" class="form-control" 
                name="data_movimento" id="data_movimento" 
                value="<?= (isset($dados['data_movimento']) ? $dados['data_movimento'] : "") ?>"
                required autofocus>
        </div>

        <div class="col-6 col-sm-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" id="tipo" aria-label="Default_select_tipo">
                <option <?= (isset($dados['tipo']) ? ($dados['tipo'] == ""  ? "selected" : "") : "") ?> value="">...</option>
                <option <?= (isset($dados['tipo']) ? ($dados['tipo'] == "1" ? "selected" : "") : "") ?> value="1">Entrada</option>
                <option <?= (isset($dados['tipo']) ? ($dados['tipo'] == "11" ? "selected" : "") : "") ?> value="11">Saida</option>
            </select>
        </div>

        <div class="col-6">
            <label for="tipo" class="form-label">Usuário</label>
            <input type="text" class="form-control" 
                name="usuario" id="usuario" 
                readonly
                value="<?= (isset($dados['usuario']) ? $dados['usuario'] : $_SESSION['userLogado']['nome']) ?>">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-12">
            <label for="produto_id" class="form-label">Produto</label>
            <select class="form-select" name="produto_id" id="produto_id" aria-label="Default_select_produto_id">
                <option <?= (isset($dados['produto_id']) ? ($dados['produto_id'] == ""  ? "selected" : "") : "") ?> value="">...</option>
                <?php foreach ($aProduto as $value): ?>
                    <option <?= (isset($dados['produto_id']) ? ($dados['produto_id'] == $value['id']  ? "selected" : "") : "") ?> value="<?= $value['id'] ?>"><?= $value['descricao'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-6 col-sm-4">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="text" class="form-control" 
                name="quantidade" id="quantidade"
                value="<?= (isset($dados['quantidade']) ? $dados['quantidade'] : "0,000") ?>"
                dir="rtl">
        </div>
        <div class="col-6 col-sm-4">
            <label for="valorUnitario" class="form-label">Valor Unitário</label>
            <input type="text" class="form-control" 
                name="valorUnitario" id="valorUnitario"
                value="<?= (isset($dados['valorUnitario']) ? $dados['valorUnitario'] : "0,00") ?>"
                dir="rtl">
        </div>
        <div class="col-6 col-sm-4">
            <label for="valorTotal" class="form-label">Valor Total</label>
            <input type="text" class="form-control" 
                name="valorTotal" id="valorTotal"
                value="<?= (isset($dados['valorTotal']) ? $dados['valorTotal'] : "0,00") ?>"
                disabled
                dir="rtl">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 mt-3">
            <a href="/Movimentacao" class="btn btn-secondary" title="Voltar">Voltar</a>
            <?php if ($action != "view"): ?>
                <button type="submit" class="btn btn-primary">Gravar</button>
            <?php endif; ?>
        </div>
    </div>

</form>

<script type="text/javascript">

    $(document).ready(function() {
        $('#quantidade').mask('##.###.###.##0,000', {reverse:true});
        $('#valorUnitario').mask('##.###.###.##0,00', {reverse:true});
    })

</script>

<?php require_once "app/view/comuns/rodape.php" ?>