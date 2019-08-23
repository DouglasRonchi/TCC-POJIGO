<?php
require_once 'Autoload.class.php';


class Registro extends Site {

	public $id;
    public $fk_usuario;
    public $fk_rota;
    public $inicio_viagem;
    public $inicio_intervalo;
    public $fim_intervalo;
    public $inicio_parada_um;
    public $fim_parada_um;
    public $inicio_parada_dois;
    public $fim_parada_dois;
    public $fim_viagem;
    public $cod_viagem;
    public $fk_veiculo;
    public $fk_diaria;
    public $fk_motivo_parada_um;
    public $fk_motivo_parada_dois;

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

$registro = New Registro;
$query = $registro->selectRegistros(19);
$result = mysqli_fetch_assoc($query);


$hora_inicio = (int)substr($result['hora_inicio'], -8,-6);
$minuto_inicio = (int)substr($result['hora_inicio'], -4,-2);



var_dump($hora_inicio);
var_dump($minuto_inicio);