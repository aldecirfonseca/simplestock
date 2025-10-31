<?php require_once "app/view/comuns/cabecalho.php" ?>

<?= cabecalho("Produto", "Produto") ?>

<form method="POST" action="/Produto/<?= $action ?>">

    <input type="hidden" name="id" id="id" 
        value="<?= (isset($dados['id']) ? $dados['id'] : "") ?>">

    <div class="row mb-3">
        <div class="col-12">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" 
                name="descricao" id="descricao" 
                placeholder="Descrição do Produto"
                value="<?= (isset($dados['descricao']) ? $dados['descricao'] : "") ?>"
                required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <label for="detalhes" class="form-label">Detalhes</label>
            <textarea class="form-control" name="detalhes" id="detalhes"><?= (isset($dados['detalhes']) ? $dados['detalhes'] : "") ?></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-sm-6">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select class="form-select" name="departamento_id" id="departamento_id" aria-label="Default_select_departamento_id">
                <option <?= (isset($dados['departamentoid']) ? ($dados['departamento_id'] == ""  ? "selected" : "") : "") ?> value="">...</option>
                <?php foreach ($aDepartamento as $value): ?>
                    <option <?= (isset($dados['departamento_id']) ? ($dados['departamento_id'] == $value['id']  ? "selected" : "") : "") ?> value="<?= $value['id'] ?>"><?= $value['descricao'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-6 col-sm-3">
            <label for="statusRegistro" class="form-label">Status</label>
            <select class="form-select" name="statusRegistro" id="statusRegistro" aria-label="Default_select_statusRegistro">
                <option <?= (isset($dados['statusRegistro']) ? ($dados['statusRegistro'] == ""  ? "selected" : "") : "") ?> value="">...</option>
                <option <?= (isset($dados['statusRegistro']) ? ($dados['statusRegistro'] == "1" ? "selected" : "") : "") ?> value="1">Ativo</option>
                <option <?= (isset($dados['statusRegistro']) ? ($dados['statusRegistro'] == "2" ? "selected" : "") : "") ?> value="2">Inativo</option>
            </select>
        </div>
        <div class="col-6 col-sm-3">
            <label for="precoVenda" class="form-label">Preço de Venda</label>
            <input type="text" class="form-control" 
                name="precoVenda" id="precoVenda"
                value="<?= (isset($dados['precoVenda']) ? $dados['precoVenda'] : "0,00") ?>"
                required
                dir="rtl">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6 col-sm-4">
            <label for="saldoEmEstoque" class="form-label">Saldo em Estoque</label>
            <input type="text" class="form-control" 
                name="saldoEmEstoque" id="saldoEmEstoque"
                value="<?= (isset($dados['saldoEmEstoque']) ? $dados['saldoEmEstoque'] : "0,000") ?>"
                disabled
                dir="rtl">
        </div>
        <div class="col-6 col-sm-4">
            <label for="custoUnitario" class="form-label">Custo Unitário</label>
            <input type="text" class="form-control" 
                name="custoUnitario" id="custoUnitario"
                value="<?= (isset($dados['custoUnitario']) ? $dados['custoUnitario'] : "0,0000") ?>"
                disabled
                dir="rtl">
        </div>
        <div class="col-6 col-sm-4">
            <label for="custoTotal" class="form-label">Custo Total</label>
            <input type="text" class="form-control" 
                name="custoTotal" id="custoTotal"
                value="<?= (isset($dados['custoTotal']) ? $dados['custoTotal'] : "0,00") ?>"
                disabled
                dir="rtl">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 mt-3">
            <a href="/Produto" class="btn btn-secondary" title="Voltar">Voltar</a>
            <?php if ($action != "view"): ?>
                <button type="submit" class="btn btn-primary">Gravar</button>
            <?php endif; ?>
        </div>
    </div>

</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#saldoEmEstoque').mask('##.###.###.##0,000', {reverse:true});
        $('#precoVenda').mask('##.###.###.##0,00', {reverse:true});
    })
</script>

<?php require_once "app/view/comuns/rodape.php" ?>