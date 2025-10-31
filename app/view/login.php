<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHP Básico (4º período)</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= baseUrl() ?>assets/css/stilo.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </head>

    <body>

        <main class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 mx-auto">
                    <div class="card shadow-lg p-2 p-md-3">
                        <h3 class="text-center mb-4 card-title">Acesso à Conta</h3>

                        <form action="/Login/login" method="POST">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="seu@email.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" name="password"  id="password" placeholder="********" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Lembrar de mim
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none">Esqueci a senha?</a>
                            </div>

                            <div class="mb-3">
                                <?= mensagens() ?>
                            </div>

                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <a href="<?= baseUrl() ?>" class="btn btn-secondary btn-md text-decoration-none ps-4 pe-4">Voltar</a>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary btn-md ps-4 pe-4">Entrar</button>
                            </div>
                        </form>

                        <hr>

                        <div class="text-center small mt-2">
                            Ao continuar, você concorda com nossas
                            <a href="/politica-privacidade" target="_blank" class="text-decoration-none">Políticas de
                                Privacidade</a>
                            e
                            <a href="/politica-cookies" target="_blank" class="text-decoration-none">Política de Cookies</a>.
                        </div>

                        <div class="text-center mt-2">
                            Não tem uma conta? <a href="#" class="text-decoration-none">Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <span>&copy; 2025 - PHP Básico (4º Período) Professor Aldecir Fonseca | Todos os direitos reservados</span>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>            