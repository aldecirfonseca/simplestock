<?php

class Sistema extends BaseController
{
    public function index()
    {
        return $this->view("admin/home");
    }

    public function trocaSenha()
    {
        $this->helper("crud");                          // Carregar os Helpers

        return $this->view("admin/formTrocaSenha");
    }
}