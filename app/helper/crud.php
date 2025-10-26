<?php

/**
 * mensagens
 *
 * @return string
 */
function mensagens() : string
{
    $msgSucesso = "";
    $msgError = "";
    $retHTML = "";

    if (isset($_SESSION['msgSucesso'])) {
        $msgSucesso = $_SESSION['msgSucesso'];
        // destroy a sessão 
        unset($_SESSION['msgSucesso']);
    }
    if (isset($_SESSION['msgError'])) {
        $msgError = $_SESSION['msgError'];
        // destroy a sessão
        unset($_SESSION['msgError']);
    }

    if (!empty($msgSucesso)) {
        $retHTML .= '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . $msgSucesso . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if (!empty($msgError)) {
        $retHTML .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>' . $msgError . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    return $retHTML;
}

/**
 * cabecalho
 *
 * @param string $titulo 
 * @param string $programa 
 * @return string
 */
function cabecalho(
    string $titulo, 
    string $programa
    ) : string
{
    $request = new Request();
    $action = $request->getAction();

    if ($action != "") {
        if ($action == "insert") {
            $subTitulo = "- Novo";
        } elseif ($action == "update") {
            $subTitulo = "- Alteração";
        } elseif ($action == "delete") {
            $subTitulo = "- Exclusão";
        } elseif ($action == "view") {
            $subTitulo = "- Visualização";
        }

        $btHTML = '<a href="/' . $programa . '" class="btn btn-secondary" title="Voltar">Voltar</a>';
    } else {
        $subTitulo = '';
        $btHTML = '<a href="/' . $programa . '/form/insert" class="btn btn-primary" title="Novo">Novo</a>';
    }

    $retHTML = '<div class="row">
                    <div class="col-10">
                        <h2>' . $titulo . $subTitulo . '</h2>
                    </div>
                    <div class="col-2 text-end">
                        ' . $btHTML . '
                    </div>
                </div>

                <hr />';
    
    $retHTML .= mensagens();

    return $retHTML;
}