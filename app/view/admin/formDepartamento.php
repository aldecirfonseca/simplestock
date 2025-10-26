<?php require_once "app/view/comuns/cabecalho.php"; ?>

<?= cabecalho("Departamento", "Departamento") ?>

<form method="POST" action="/Departamento/<?= $action ?>">

    <input type="hidden" name="id" id="id" 
        value="<?= (isset($dados['id']) ? $dados['id'] : "") ?>">

    <div class="row mb-3">
        <div class="col-8">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" 
                name="descricao" id="descricao" 
                placeholder="Descrição do Departamento"
                value="<?= (isset($dados['descricao']) ? $dados['descricao'] : "") ?>"
                required autofocus>
        </div>
        <div class="col-4">
            <label for="statusRegistro" class="form-label">Status</label>
            <select class="form-select" name="statusRegistro" id="statusRegistro" aria-label="Default_select_statusRegistro">
                <option <?= (isset($dados['statusRegistro']) ? ($dados['statusRegistro'] == ""  ? "selected" : "") : "") ?> value="">...</option>
                <option <?= (isset($dados['statusRegistro']) ? ($dados['statusRegistro'] == "1" ? "selected" : "") : "") ?> value="1">Ativo</option>
                <option <?= (isset($dados['statusRegistro']) ? ($dados['statusRegistro'] == "2" ? "selected" : "") : "") ?> value="2">Inativo</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 mt-3">
            <a href="/Departamento" class="btn btn-secondary" title="Voltar">Voltar</a>
            <?php if ($action != "view"): ?>
                <button type="submit" class="btn btn-primary">Gravar</button>
            <?php endif; ?>
        </div>
    </div>

</form>

<?php require_once "app/view/comuns/rodape.php"; ?>