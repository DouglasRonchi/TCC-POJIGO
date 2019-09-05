<?php
require_once 'Autoload.class.php';
$login = new Login;
$login->VerificarLogin();

class Registro extends Site {

	protected $id;
    protected $fk_usuario;
    protected $fk_rota;
    protected $inicio_viagem;
    protected $inicio_intervalo;
    protected $fim_intervalo;
    protected $inicio_parada_um;
    protected $fim_parada_um;
    protected $inicio_parada_dois;
    protected $fim_parada_dois;
    protected $fim_viagem;
    protected $cod_viagem;
    protected $fk_veiculo;
    protected $fk_diaria;
    protected $fk_motivo_parada_um;
    protected $fk_motivo_parada_dois;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return Registro
     */
    public function setFkUsuario($fk_usuario)
    {
        $this->fk_usuario = $fk_usuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkRota()
    {
        return $this->fk_rota;
    }

    /**
     * @param mixed $fk_rota
     * @return Registro
     */
    public function setFkRota($fk_rota)
    {
        $this->fk_rota = $fk_rota;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInicioViagem()
    {
        return $this->inicio_viagem;
    }

    /**
     * @param mixed $inicio_viagem
     * @return Registro
     */
    public function setInicioViagem($inicio_viagem)
    {
        $this->inicio_viagem = $inicio_viagem;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInicioIntervalo()
    {
        return $this->inicio_intervalo;
    }

    /**
     * @param mixed $inicio_intervalo
     * @return Registro
     */
    public function setInicioIntervalo($inicio_intervalo)
    {
        $this->inicio_intervalo = $inicio_intervalo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFimIntervalo()
    {
        return $this->fim_intervalo;
    }

    /**
     * @param mixed $fim_intervalo
     * @return Registro
     */
    public function setFimIntervalo($fim_intervalo)
    {
        $this->fim_intervalo = $fim_intervalo;
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
     * @return Registro
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
     * @return Registro
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
     * @return Registro
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
     * @return Registro
     */
    public function setFimParadaDois($fim_parada_dois)
    {
        $this->fim_parada_dois = $fim_parada_dois;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFimViagem()
    {
        return $this->fim_viagem;
    }

    /**
     * @param mixed $fim_viagem
     * @return Registro
     */
    public function setFimViagem($fim_viagem)
    {
        $this->fim_viagem = $fim_viagem;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodViagem()
    {
        return $this->cod_viagem;
    }

    /**
     * @param mixed $cod_viagem
     * @return Registro
     */
    public function setCodViagem($cod_viagem)
    {
        $this->cod_viagem = $cod_viagem;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkVeiculo()
    {
        return $this->fk_veiculo;
    }

    /**
     * @param mixed $fk_veiculo
     * @return Registro
     */
    public function setFkVeiculo($fk_veiculo)
    {
        $this->fk_veiculo = $fk_veiculo;
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
     * @return Registro
     */
    public function setFkDiaria($fk_diaria)
    {
        $this->fk_diaria = $fk_diaria;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkMotivoParadaUm()
    {
        return $this->fk_motivo_parada_um;
    }

    /**
     * @param mixed $fk_motivo_parada_um
     * @return Registro
     */
    public function setFkMotivoParadaUm($fk_motivo_parada_um)
    {
        $this->fk_motivo_parada_um = $fk_motivo_parada_um;
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
     * @return Registro
     */
    public function setFkMotivoParadaDois($fk_motivo_parada_dois)
    {
        $this->fk_motivo_parada_dois = $fk_motivo_parada_dois;
        return $this;
    }





    public function selectRegistros($fk_usuario)
    {
    	return $this->executeQuery("SELECT * FROM registro_ponto WHERE fk_usuario = {$fk_usuario}");
    }

    public function editarRegistro()
    {
    	# code...
    }

    public function excluirRegistro()
    {
    	# code...
    }

}