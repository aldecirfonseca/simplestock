<?php
    session_start();

    require_once "app/config/config.php";
    require_once "app/library/Request.php";
    require_once "app/controller/BaseController.php";
    require_once "app/model/BaseModel.php";

    // Obter a rota (controller e método)
    $uri = explode("/", $_SERVER['REQUEST_URI']);

    if ($_SERVER['REQUEST_URI'] == "/") {
        $controllerNome = "Home";
    } else {
        $controllerNome = $uri[1];
    }

    $metodo = isset($uri[2]) ? $uri[2] : "index";

    if (file_exists("app/controller/" . $controllerNome . ".php")) {
        require_once "app/controller/" . $controllerNome . ".php";

        $objController = new $controllerNome();

        if (method_exists($objController, $metodo)) {
            $objController->$metodo();
        } else {
            echo "Método (" . $metodo . ") não localizado no controller: " . $controllerNome;
        }
    } else {
        echo "Controller (" . $controllerNome . ") não localizado";
    }