<?php require_once "app/view/comuns/cabecalho.php"; ?>

    <div class="contact-container">
        <h1 class="page-title">Entre em Contato</h1>

        <div class="row">
            <!-- Formulário de Contato -->
            <div class="col-lg-7 mb-4">
                <h3 class="section-title">Envie sua Mensagem</h3>
                <form id="contactForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" placeholder="Seu nome completo" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="seu@email.com" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" placeholder="(00) 00000-0000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="assunto" class="form-label">Assunto</label>
                        <select class="form-select" id="assunto" required>
                            <option value="">Selecione um assunto</option>
                            <option value="duvida">Dúvida</option>
                            <option value="suporte">Suporte Técnico</option>
                            <option value="orcamento">Orçamento</option>
                            <option value="parceria">Parceria</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" rows="6" placeholder="Escreva sua mensagem aqui..." required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <button type="button" class="btn btn-secondary contato-btn-secondary" onclick="limparFormulario()">Limpar</button>
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-primary contato-btn-primary">Enviar Mensagem</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Informações de Contato -->
            <div class="col-lg-5">
                <h3 class="section-title">Informações de Contato</h3>
                <div class="contact-info-card">
                    <div class="contact-info-item">
                        <i class="bi bi-envelope-fill contact-icon"></i>
                        <div class="contact-info-content">
                            <h6>Email</h6>
                            <p>contato@empresa.com.br</p>
                            <p>suporte@empresa.com.br</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <i class="bi bi-telephone-fill contact-icon"></i>
                        <div class="contact-info-content">
                            <h6>Telefone</h6>
                            <p>(11) 3000-0000</p>
                            <p>(11) 99999-9999</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <i class="bi bi-geo-alt-fill contact-icon"></i>
                        <div class="contact-info-content">
                            <h6>Endereço</h6>
                            <p>Praça Irmã Annina Bisegna, 40</p>
                            <p>Centro, Muriaé - MG</p>
                            <p>CEP: 36880-083</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <i class="bi bi-clock-fill contact-icon"></i>
                        <div class="contact-info-content">
                            <h6>Horário de Atendimento</h6>
                            <p>Segunda a Sexta: 8h às 18h</p>
                            <p>Sábado: 9h às 13h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa de Localização -->
        <div class="row">
            <div class="col-12">
                <h3 class="section-title" style="margin-top: 50px;">Nossa Localização</h3>
                <div class="map-container">
                    <!-- Substitua o src abaixo pelo link do seu mapa do Google Maps -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.3807890580866!2d-42.37069892379895!3d-21.13029098051775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa1c4b0f0a8b0b3%3A0x7e7c8a0b8c9d0e0f!2sPra%C3%A7a%20Irm%C3%A3%20Annina%20Bisegna%2C%2040%20-%20Centro%2C%20Muria%C3%A9%20-%20MG%2C%2036880-083!5e0!3m2!1spt-BR!2sbr!4v1699999999999!5m2!1spt-BR!2sbr" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função para limpar o formulário
        function limparFormulario() {
            document.getElementById('contactForm').reset();
        }

        // Função para lidar com o envio do formulário
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Aqui você pode adicionar a lógica para enviar os dados para o servidor
            // Por exemplo, usando fetch() ou AJAX
            
            // Exemplo de validação e feedback
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const telefone = document.getElementById('telefone').value;
            const assunto = document.getElementById('assunto').value;
            const mensagem = document.getElementById('mensagem').value;

            // Simulando envio
            alert('Mensagem enviada com sucesso!\n\nNome: ' + nome + '\nEmail: ' + email);
            
            // Limpar formulário após envio
            limparFormulario();
        });

        // Máscara para telefone
        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 10) {
                e.target.value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else if (value.length > 6) {
                e.target.value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else if (value.length > 2) {
                e.target.value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
            } else {
                e.target.value = value.replace(/(\d*)/, '$1');
            }
        });
    </script>

<?php require_once "app/view/comuns/rodape.php"; ?>