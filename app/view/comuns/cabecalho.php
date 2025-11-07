<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Stock</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= baseUrl() ?>assets/css/stilo.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/v/bs5/dt-2.3.4/datatables.min.css" rel="stylesheet" integrity="sha384-i0jVPhw/X00l5EPvMOBv0lcGYXlSQGOqNYpMK/406rxta9oBump0IZJIHzvtf3+H" crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </head>

    <body>

        <div class="container-fluid">

            <header>

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/Home"><strong>Simple Stock</strong></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <?php if (isset($_SESSION['userLogado'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/Sistema">Início</a>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/Home/contato">Contato</a>
                                </li>
                                <?php if (!isset($_SESSION['userLogado'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Login">Área Restrita</a>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= $_SESSION['userLogado']['nome'] ?>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu">
                                            <li><a class="dropdown-item" href="/Login/Logout">Sair</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="/Departamento">Departamento</a></li>
                                            <li><a class="dropdown-item" href="/Produto">Produto</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Usuário</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>

            </header>

            <main>

                <div class="container mt-4">
