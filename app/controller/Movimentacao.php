<?php

class Movimentacao extends BaseController
{
    protected $model;

    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();                          // Chama o método construtor da classe BaseController
        $this->model = $this->model("Movimentacao");    // Carregar o model
        $this->helper("crud");                          // Carregar os Helpers
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->view(
            "admin/listaMovimentacao",
            ["rows" => $this->model->lista()]
        );
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        return $this->view(
            "admin/formMovimentacao",
            ["dados" => $this->model->getById($this->request->getId())]
        );
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $id = $this->model->insert($_POST);

        if ($id > 0) {
            // redirect com a mensagem de sucesso
            $_SESSION['msgSucesso'] = "Registro inserido com sucesso.";
        } else {
            // redirect com a mensagem de Error
            $_SESSION['msgError'] = "Falha ao inserir registro.";
        }

        return header("Location: /Movimentacao");
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $id = $this->model->update($_POST);

        if ($id > 0) {
            // redirect com a mensagem de sucesso
            $_SESSION['msgSucesso'] = "Registro atualizado com sucesso.";
        } else {
            // redirect com a mensagem de Error
            $_SESSION['msgError'] = "Falha ao atualizar registro.";
        }

        return header("Location: /Movimentacao");
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        if ($this->model->delete($_POST['id'])) {
            // redirect com a mensagem de sucesso
            $_SESSION['msgSucesso'] = "Registro excluído com sucesso.";
        } else {
            // redirect com a mensagem de Error
            $_SESSION['msgError'] = "Falha ao excluir registro.";
        }
        
        return header("Location: /Movimentacao");
    }
}