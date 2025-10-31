<?php

class UsuarioModel extends BaseModel
{   
    /**
     * lista
     *
     * @return void
     */
    public function lista()
    {
        return $this->connDb->select("SELECT * FROM usuario as d ORDER BY nome");
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
            "SELECT * FROM usuario WHERE id = ?", 
            [$id], 
            "first"
        );
    }

    /**
     * getUserEmail
     *
     * @param string $email 
     * @return array|null
     */
    public function getUserEmail($email)
    {
        return $this->connDb->select(
            "SELECT * FROM usuario WHERE email = ?", 
            [$email], 
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
            "INSERT INTO usuario (nome, email, senha, nivel, statusRegistro) VALUES (?, ?, ?, ?, ?)",
            [
                $post['nome'],
                $post['email'],
                password_hash(trim($post['senha']), PASSWORD_DEFAULT),
                $post['nivel'],
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
            "UPDATE usuario SET nome = ?, email = ?, senha = ?, nivel = ?, statusRegistro = ? WHERE id = ?",
            [
                $post['nome'],
                $post['email'],
                password_hash(trim($post['senha']), PASSWORD_DEFAULT),
                $post['nivel'],
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
            "DELETE FROM usuario WHERE id = ?",
            [
                $id
            ]
        );
    }
}