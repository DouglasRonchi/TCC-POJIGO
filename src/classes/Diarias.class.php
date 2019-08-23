<?php

require_once 'Autoload.class.php';

class Diarias extends Site {

    public $id;
    public $nome;
    public $valor;
    public $fk_diaria;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Diarias
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     * @return Diarias
     */
    public function setNome($Nome)
    {
        $this->Nome = $Nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param mixed $Valor
     * @return Diarias
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkDiaria()
    {
        return $this->fk_diaria;
    }

    /**
     * @param mixed $fk_diaria
     * @return Diarias
     */

    public function setFkDiaria($fk_diaria)
    {
        $this->fk_diaria = $fk_diaria;
        return $this;
    }

    public function pagarDiaria()
    {
        # code...
    }



}