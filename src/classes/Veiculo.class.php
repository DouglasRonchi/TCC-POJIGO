<?php

require_once 'Autoload.class.php';
$login = new Login;
$login->VerificarLogin();

class Veiculo extends Site
{

    protected $id;
    protected $frota;
    protected $marca;
    protected $modelo;
    protected $placa;
    protected $chassi;
    protected $renavam;
    protected $capacidade_tanque;
    protected $ano_fabricacao;
    protected $ano_modelo;
    protected $capacidade_carga;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
{
    $this->id = $id;
    return $this;
}
    /**
     * @return mixed
     */
    public function getFrota()
    {
        return $this->frota;
    }

    /**
     * @param mixed $frota
     * @return Veiculo
     */
    public function setFrota($frota)
    {
        $this->frota = $frota;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     * @return Veiculo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     * @return Veiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     * @return Veiculo
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChassi()
    {
        return $this->chassi;
    }

    /**
     * @param mixed $chassi
     * @return Veiculo
     */
    public function setChassi($chassi)
    {
        $this->chassi = $chassi;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * @param mixed $renavam
     * @return Veiculo
     */
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapacidadeTanque()
    {
        return $this->capacidade_tanque;
    }

    /**
     * @param mixed $capacidade_tanque
     * @return Veiculo
     */
    public function setCapacidadeTanque($capacidade_tanque)
    {
        $this->capacidade_tanque = $capacidade_tanque;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnoFabricacao()
    {
        return $this->ano_fabricacao;
    }

    /**
     * @param mixed $ano_fabricacao
     * @return Veiculo
     */
    public function setAnoFabricacao($ano_fabricacao)
    {
        $this->ano_fabricacao = $ano_fabricacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnoModelo()
    {
        return $this->ano_modelo;
    }

    /**
     * @param mixed $ano_modelo
     * @return Veiculo
     */
    public function setAnoModelo($ano_modelo)
    {
        $this->ano_modelo = $ano_modelo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapacidadeCarga()
    {
        return $this->capacidade_carga;
    }

    /**
     * @param mixed $capacidade_carga
     * @return Veiculo
     */
    public function setCapacidadeCarga($capacidade_carga)
    {
        $this->capacidade_carga = $capacidade_carga;
        return $this;
    }

    public function getFrotaById($id)
    {
        $result = mysqli_fetch_assoc($this->executeQuery("SELECT frota FROM veiculos WHERE id = $id"));
        return $result['frota'];
    }

    /**
     * Função de cadastro de veículos
     * @return true ou false
     */
    public function cadastrarVeiculo()
    {

        $sql = "INSERT INTO `veiculos` (id, frota, fk_modelo, placa, chassi, renavam, capacidade_tanque, ano_fab, ano_mod, capacidade_carga) VALUES
        (DEFAULT, '{$this->getFrota()}', '{$this->getModelo()}', '{$this->getPlaca()}', '{$this->getChassi()}', '{$this->getRenavam()}', '{$this->getCapacidadeTanque()}', '{$this->getAnoFabricacao()}', '{$this->getAnoModelo()}', '{$this->getCapacidadeCarga()}')";

        $this->executeQuery($sql);


    }

    /**
     * Função de atualizar de veículos
     * @return true ou false
     */
    public function atualizarVeiculo()
    {

        $sqlfrota = "UPDATE veiculos SET frota = '{$this->getFrota()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlfrota);
        
        $sqlmarca = "UPDATE marca_veiculo SET marca = '{$this->getMarca()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlmarca);

        $sqlmodelo = "UPDATE modelo_veiculo SET modelo = '{$this->getModelo()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlmodelo);

        $sqlplaca = "UPDATE veiculos SET placa = '{$this->getPlaca()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlplaca);

        $sqlchassi = "UPDATE veiculos SET chassi = '{$this->getChassi()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlchassi);

        $sqlrenavam = "UPDATE veiculos SET renavam = '{$this->getRenavam()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlrenavam);


        $sqlano_fab = "UPDATE veiculos SET ano_fab = '{$this->getAnoFabricacao()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlano_fab);

        $sqlano_mod = "UPDATE veiculos SET ano_mod = '{$this->getAnoModelo()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlano_mod);


        $sqlcapacidade_carga = "UPDATE veiculos SET capacidade_carga = '{$this->getCapacidadeCarga()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlcapacidade_carga);


        $sqlcapacidade_tanque = "UPDATE veiculos SET capacidade_tanque = '{$this->getCapacidadeTanque()}' WHERE id = {$this->getId()}";
        $this->executeQuery($sqlcapacidade_tanque);

        header('Location:../pages/paginagestor/relatorio_veiculos.php');

    }

    /**
     * Função para deletar veículos
     * @return true ou false
     */
    public function deletarVeiculo()
    {


    }


}