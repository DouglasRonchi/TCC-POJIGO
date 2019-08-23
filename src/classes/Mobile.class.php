<?php
require_once 'Autoload.class.php';


class Mobile extends Site {

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

    //Iniciando o registro
    public function startRegistro(){
        //id fk_usuario cod_viagem
        $codigo_viagem = md5(time());
        $this->executeQuery("INSERT INTO registro_ponto (id, fk_usuario, cod_viagem) VALUES (DEFAULT,{$_SESSION['usuario_id']},'{$codigo_viagem}')");
        $_SESSION['id_rota'] = mysqli_insert_id($this->getConn());
    }

    public function inserirHoraInicio(){


    }


}
