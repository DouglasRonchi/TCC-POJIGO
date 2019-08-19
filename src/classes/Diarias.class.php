<?php

require_once "Site.class.php";

class Diarias extends Site
{

    public $id;
    public $fk_usuario;
    public $fk_inicial;
    public $hora_inicio;
    public $hora_inicio_intervalo;
    public $hora_fim_intervalo;
    public $inicio_parada_um;
    public $fim_parada_um;
    public $inicio_parada_dois;
    public $fim_parada_dois;
    public $hora_fim;
    public $fk_diaria;
    public $fk_mtivo_parada_um;
    public $fk_motivo_parada_dois;

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
    public function getFkUsuario()
    {
        return $this->fk_usuario;
    }

    /**
     * @param mixed $fk_usuario
     * @return Diarias
     */
    public function setFkUsuario($fk_usuario)
    {
        $this->fk_usuario = $fk_usuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkInicial()
    {
        return $this->fk_inicial;
    }

    /**
     * @param mixed $fk_inicial
     * @return Diarias
     */
    public function setFkInicial($fk_inicial)
    {
        $this->fk_inicial = $fk_inicial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * @param mixed $hora_inicio
     * @return Diarias
     */
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraInicioIntervalo()
    {
        return $this->hora_inicio_intervalo;
    }

    /**
     * @param mixed $hora_inicio_intervalo
     * @return Diarias
     */
    public function setHoraInicioIntervalo($hora_inicio_intervalo)
    {
        $this->hora_inicio_intervalo = $hora_inicio_intervalo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraFimIntervalo()
    {
        return $this->hora_fim_intervalo;
    }

    /**
     * @param mixed $hora_fim_intervalo
     * @return Diarias
     */
    public function setHoraFimIntervalo($hora_fim_intervalo)
    {
        $this->hora_fim_intervalo = $hora_fim_intervalo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInicioParadaUm()
    {
        return $this->inicio_parada_um;
    }

    /**
     * @param mixed $inicio_parada_um
     * @return Diarias
     */
    public function setInicioParadaUm($inicio_parada_um)
    {
        $this->inicio_parada_um = $inicio_parada_um;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFimParadaUm()
    {
        return $this->fim_parada_um;
    }

    /**
     * @param mixed $fim_parada_um
     * @return Diarias
     */
    public function setFimParadaUm($fim_parada_um)
    {
        $this->fim_parada_um = $fim_parada_um;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInicioParadaDois()
    {
        return $this->inicio_parada_dois;
    }

    /**
     * @param mixed $inicio_parada_dois
     * @return Diarias
     */
    public function setInicioParadaDois($inicio_parada_dois)
    {
        $this->inicio_parada_dois = $inicio_parada_dois;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFimParadaDois()
    {
        return $this->fim_parada_dois;
    }

    /**
     * @param mixed $fim_parada_dois
     * @return Diarias
     */
    public function setFimParadaDois($fim_parada_dois)
    {
        $this->fim_parada_dois = $fim_parada_dois;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraFim()
    {
        return $this->hora_fim;
    }

    /**
     * @param mixed $hora_fim
     * @return Diarias
     */
    public function setHoraFim($hora_fim)
    {
        $this->hora_fim = $hora_fim;
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

    /**
     * @return mixed
     */
    public function getFkMtivoParadaUm()
    {
        return $this->fk_mtivo_parada_um;
    }

    /**
     * @param mixed $fk_mtivo_parada_um
     * @return Diarias
     */
    public function setFkMtivoParadaUm($fk_mtivo_parada_um)
    {
        $this->fk_mtivo_parada_um = $fk_mtivo_parada_um;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkMotivoParadaDois()
    {
        return $this->fk_motivo_parada_dois;
    }

    /**
     * @param mixed $fk_motivo_parada_dois
     * @return Diarias
     */
    public function setFkMotivoParadaDois($fk_motivo_parada_dois)
    {
        $this->fk_motivo_parada_dois = $fk_motivo_parada_dois;
        return $this;
    }






}