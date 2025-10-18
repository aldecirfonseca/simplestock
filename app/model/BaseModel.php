<?php

require_once "app/library/Database.php";

class BaseModel
{
    protected $connDb;

    public function __construct()
    {
        $this->connDb = new Database();
    }
}