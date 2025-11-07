<?php

class MovimentacaoModel extends BaseModel
{   
    /**
     * lista
     *
     * @return void
     */
    public function lista()
    {
        return $this->connDb->select("SELECT * FROM movimentacao as d ORDER BY data_movimento DESC, id DESC");
    }

    /**
     * getById
     *
     * @param int $id 
     * @return array|null
     */
    public function getById($id)
    {
        return $this->connDb->select(
            "SELECT * FROM movimentacao WHERE id = ?", 
            [$id], 
            "first"
        );
    }

    /**
     * insert
     *
     * @param arrray $post 
     * @return int
     */
    public function insert($post)
    {
        return $this->connDb->insert(
            "INSERT INTO movimentacao 
            (usuario_id, produto_id, tipo, data_movimento, 
            quantidade, valorUnitario, custoUnitario) 
            VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $_SESSION['userLogado']['id'],
                $post['produto_id'],
                $post['tipo'],
                date("Y-m-d H:i:s"),
                $post['quantidade'],
                $post['valorUnitário'],
                $post['custoUnitario']
            ]
        );
    }

    /**
     * update
     *
     * @param array $post 
     * @return int
     */
    public function update($post)
    {
        return $this->connDb->update(
            "UPDATE departamento SET descricao = ?, statusRegistro = ? WHERE id = ?",
            [
                $post['descricao'],
                $post['statusRegistro'],
                $post['id']
            ]
        );
    }

    /**
     * delete
     *
     * @param int $id 
     * @return int
     */
    public function delete($id)
    {
        return $this->connDb->delete(
            "DELETE FROM departamento WHERE id = ?",
            [
                $id
            ]
        );
    }
}