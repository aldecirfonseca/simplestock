<?php

class Database
{
    /**
     * conecta
     *
     * @return object
     */
    public function conecta()
    {
        $conexao = (object)NULL;

        try {
            $conexao = new PDO(
                "mysql:host=localhost;port=3306;dbname=phpbasico2025",
                "root",         // usuário
                "",             // senha
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

            //configurando o modo de tratamento de erro
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexao;

        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return $conexao;
        }
    }

    /**
     * select
     *
     * @param string $comando_sql 
     * @param array $dados 
     * @param string $tipoRetorno 
     * @return array
     */
    public function select(
        string $comando_sql, 
        array $dados = [],
        string $tipoRetorno = 'all'
    ) {
        $conn = $this->conecta();
        $data = $conn->prepare($comando_sql, array( PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL ) );

        // executa o comando SQL
        $data->execute($dados);

        if ($tipoRetorno == 'all') {
            $dadosRows = $data->fetchAll();
        } else {
            $dadosRows = $data->fetch();
        }

        return $dadosRows;
    }

    /**
     * insert
     *
     * @param string $comando_sql 
     * @param array $dados 
     * @return int
     */
    public function insert(
        string $comando_sql, 
        array $dados = []
    ) {
        $conn = $this->conecta();
        $data = $conn->prepare($comando_sql, array( PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL ) );

        // executa o comando SQL
        $data->execute($dados);

        if ($conn->lastInsertId() > 0) {
            return $conn->lastInsertId();
        } else {
            return 0;
        }
    }

    /**
     * update
     *
     * @param string $comando_sql 
     * @param array $dados 
     * @return int
     */
    public function update(
        string $comando_sql, 
        array $dados = []
    ) {
        $conn = $this->conecta();
        $data = $conn->prepare($comando_sql, array( PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL ) );

        // executa o comando SQL
        $data->execute($dados);

        if ($data->rowCount() > 0) {
            return $data->rowCount();
        } else {
            return 0;
        }
    }

    /**
     * delete
     *
     * @param string $comando_sql 
     * @param array $dados 
     * @return int
     */
    public function delete(
        string $comando_sql, 
        array $dados = []
    ) {
        $conn = $this->conecta();
        $data = $conn->prepare($comando_sql, array( PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL ) );

        // executa o comando SQL
        $data->execute($dados);

        if ($data->rowCount() > 0) {
            return $data->rowCount();
        } else {
            return 0;
        }
    }
}