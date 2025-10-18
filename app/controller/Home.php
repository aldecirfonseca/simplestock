<?php

class Home extends BaseController
{
    public function index()
    {
        return $this->view("home");
    }

    public function contato()
    {
        return $this->view("contato");
    }
}