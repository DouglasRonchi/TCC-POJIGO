<?php
require_once 'Autoload.class.php';


class Mobile extends Site {

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


}

$viagem = New Mobile;
$usuario = new Usuario;
$usuario->setUsuario('douglas');

$viagem->fk_usuario = $usuario;

var_dump($viagem);