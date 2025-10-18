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
        return $this->connDb->select("SELECT * FROM departamento ORDER BY descricao");
    }
}