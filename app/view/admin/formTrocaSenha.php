<?php require_once "app/view/comuns/cabecalho.php"; ?>

<div class="container-form">
    <div class="row">
        <div class="col-12">
            <h2>Alteração de Senha</h2>
        </div>
    </div>

    <hr />

    <form id="formTrocaSenha" novalidate>
        <div class="form-header">
            <label class="form-label mb-2">Usuário</label>
            <div class="user-info">
                <i class="bi bi-person-circle me-2"></i>
                <span id="nomeUsuario"><strong>Aldecir Fonseca</strong></span>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="senhaAtual" class="form-label">Senha Atual</label>
                <div class="password-field">
                    <input type="password" class="form-control" id="senhaAtual" placeholder="Digite sua senha atual"
                        required>
                    <i class="bi bi-eye toggle-password" onclick="togglePassword('senhaAtual')"></i>
                </div>
                <div class="invalid-feedback">
                    Por favor, informe sua senha atual.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="novaSenha" class="form-label">Nova Senha</label>
                <div class="password-field">
                    <input type="password" class="form-control" id="novaSenha" placeholder="Digite a nova senha"
                        minlength="6" required>
                    <i class="bi bi-eye toggle-password" onclick="togglePassword('novaSenha')"></i>
                </div>
                <div class="form-text">Mínimo de 6 caracteres</div>
                <div class="invalid-feedback">
                    A senha deve ter no mínimo 6 caracteres.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="confirmarSenha" class="form-label">Confirmar Nova Senha</label>
                <div class="password-field">
                    <input type="password" class="form-control" id="confirmarSenha" placeholder="Confirme a nova senha"
                        required>
                    <i class="bi bi-eye toggle-password" onclick="togglePassword('confirmarSenha')"></i>
                </div>
                <div class="invalid-feedback" id="confirmarSenhaFeedback">
                    As senhas não conferem.
                </div>
            </div>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="/Departamento" class="btn btn-secondary" title="Voltar">Voltar</a>
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
    </form>
</div>

<script>
    // visualização de senha
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = field.nextElementSibling;
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }

    // Validação do formulário
    document.getElementById('formTrocaSenha').addEventListener('submit', function(event) {
        const form = this;
        const novaSenha = document.getElementById('novaSenha').value;
        const confirmarSenha = document.getElementById('confirmarSenha').value;
        const confirmarSenhaInput = document.getElementById('confirmarSenha');

        // Verifica se as senhas conferem
        if (novaSenha !== confirmarSenha) {
            event.preventDefault(); // Impede envio apenas se as senhas não conferem
            event.stopPropagation();
            confirmarSenhaInput.setCustomValidity('As senhas não conferem');
        } else {
            confirmarSenhaInput.setCustomValidity('');
        }

        // Adiciona classes de validação do Bootstrap
        form.classList.add('was-validated');

        // Se o formulário NÃO for válido, impede o envio
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        // Se for válido, o formulário será enviado automaticamente para o action
    });

    // Validação em tempo real para confirmação de senha
    document.getElementById('confirmarSenha').addEventListener('input', function() {
        const novaSenha = document.getElementById('novaSenha').value;
        const confirmarSenha = this.value;
        
        if (novaSenha !== confirmarSenha) {
            this.setCustomValidity('As senhas não conferem');
        } else {
            this.setCustomValidity('');
        }
    });

    // Previne colar senha na confirmação (opcional)
    document.getElementById('confirmarSenha').addEventListener('paste', function(e) {
        e.preventDefault();
        alert('Por favor, digite a senha novamente para confirmar.');
    });
</script>

<?php require_once "app/view/comuns/rodape.php"; ?>