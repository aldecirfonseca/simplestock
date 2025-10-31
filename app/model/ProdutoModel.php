<?php

class ProdutoModel extends BaseModel
{   
    /**
     * lista
     *
     * @return void
     */
    public function lista()
    {
        return $this->connDb->select(
            "SELECT p.*, d.descricao as descricaoDepartamento
            FROM produto as p
            INNER JOIN departamento as d ON d.id = p.departamento_id
            ORDER BY p.descricao"
        );
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
            "SELECT * FROM produto WHERE id = ?", 
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
            "INSERT INTO produto (departamento_id, statusRegistro, descricao, detalhes, precoVenda) 
            VALUES (?, ?, ?, ?, ?)",
            [
                $post['departamento_id'],
                $post['statusRegistro'],
                $post['descricao'],
                strFloat($post['detalhes']),
                $post['precoVenda'],
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
            "UPDATE produto 
            SET departamento_id = ?, statusRegistro = ?, descricao = ?, detalhes = ?, precoVenda = ?
            WHERE id = ?",
            [
                $post['departamento_id'],
                $post['statusRegistro'],
                $post['descricao'],
                $post['detalhes'],
                strFloat($post['precoVenda']),
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
            "DELETE FROM produto WHERE id = ?",
            [
                $id
            ]
        );
    }
}