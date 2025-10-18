<?php

class BaseController
{
    /**
     * view
     *
     * @param string $view 
     * @param array $data 
     * @return void
     */
    public function view(string $view, array $data = [])
    {
        if (file_exists("app/view/" . $view . ".php")){
            extract($data);
            require_once "app/view/" . $view . ".php";
        } else {
            require_once "app/view/comuns/viewNaoExiste.php";
        }
    }
}