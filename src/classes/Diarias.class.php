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

    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);

        //Diferença entre datas:
        //$this->dateDifference($hora_inicio,$hora_fim,'%h:%i'); //%h - Horas //%i - Minutos //%s - Segundos //%a - Dias


    }


    public function pagarDiaria($query)
    {
        $viagem = mysqli_fetch_assoc($query);

        $hora_inicio = (int)substr($viagem['hora_inicio'],-8,-6);
        $hora_inicio_intervalo = $viagem['hora_inicio_intervalo'];
        $hora_fim_intervalo = $viagem['hora_fim_intervalo'];
        $hora_inicio_parada_1 = $viagem['inicio_parada_um'];
        $hora_inicio_parada_2 = $viagem['inicio_parada_dois'];
        $hora_fim_parada_1 = $viagem['fim_parada_um'];
        $hora_fim_parada_2 = $viagem['fim_parada_dois'];
        $hora_fim = (int)substr($viagem['hora_fim'],-8,-6);

        //Café
        if ($hora_inicio > 6 && $hora_inicio < 9){
            $this->setFkDiaria(1);
        }
        //Almoço
        if ($hora_inicio > 11 && $hora_inicio < 13) {
            $this->setFkDiaria(2);
        }
        //Janta
        if ($hora_inicio > 19 && $hora_inicio < 22){
            $this->setFkDiaria(3);
        }
        //Cheia
        if ($hora_inicio <= 9 && $hora_fim >= 22){
            $this->setFkDiaria(6);
        } else if ($hora_inicio <= 9 && $hora_fim >= 13){
            //Café + Almoço
            $this->setFkDiaria(4);
        } else if ($hora_inicio <= 13 && $hora_fim >= 21){
            //Almoço + Janta
            $this->setFkDiaria(5);
        }

        $this->executeQuery("UPDATE registro_ponto SET fk_diaria = ({$this->getFkDiaria()}) WHERE id = {$_SESSION['id_rota']}");

    }

}





