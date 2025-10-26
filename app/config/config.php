<?php
    // Url base da aplicação
    defined("BASEURL") || define("BASEURL", "http://simplestock/");

    // defenir as configurações para acessar a base dados
    defined("DB_CONF_CONEXAO") || define("DB_CONF_CONEXAO", [
        "DB_DRIVE"  => "mysql",
        "DB_HOST"   => "localhost",
        "DB_PORT"   => 3306,
        "DB_USER"   => 'root',
        'DB_PSW'    => '',
        'DB_BDADOS' => 'simplestock'
    ]);