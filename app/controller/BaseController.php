<?php

class BaseController
{
    public $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->helper("utilits");
    }

    /**
     * model
     *
     * @param string $nomeModel 
     * @return object
     */
    public function model(string $nomeModel) : object
    {
        $nomeModel .= "Model";

        if (file_exists('app/model/' . $nomeModel . ".php")) {
            require_once "app/model/" . $nomeModel . ".php";

            return new $nomeModel();
        } else {
            return (object)null;
        }
    }

    /**
     * helper
     *
     * @param string|array $nomeHelper 
     * @return void
     */
    public function helper(string|array $nomeHelper)
    {
        if (gettype($nomeHelper) == "string") {
            $nomeHelper = [$nomeHelper];
        }

        foreach ($nomeHelper as $helper) {
            require_once "app/helper/" . $helper . ".php";
        }
    }

    /**
     * view
     *
     * @param string $view 
     * @param array $data 
     * @return void
     */
    public function view(string $view, array $data = [])
    {
        $data['action'] =  $this->request->getAction();
        
        if (file_exists("app/view/" . $view . ".php")){
            extract($data);
            require_once "app/view/" . $view . ".php";
        } else {
            require_once "app/view/comuns/viewNaoExiste.php";
        }
    }
}