<?php

class Departamento extends BaseController
{
    public function index()
    {
        return $this->view("admin/listaDepartamento");
    }
}