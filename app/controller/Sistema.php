<?php

class Sistema extends BaseController
{
    public function index()
    {
        return $this->view("admin/home");
    }
}