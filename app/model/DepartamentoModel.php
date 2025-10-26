<?php

class DepartamentoModel extends BaseModel
{   
    /**
     * lista
     *
     * @return void
     */
    public function lista()
    {
        return $this->connDb->select("SELECT * FROM departamento as d ORDER BY descricao");
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
            "SELECT * FROM departamento WHERE id = ?", 
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
            "INSERT INTO departamento (descricao, statusRegistro) VALUES (?, ?)",
            [
                $post['descricao'],
                $post['statusRegistro']
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