<?php
require_once 'Autoload.class.php';


class Mobile extends Site {

    protected $id;

    //Iniciando o registro
    public function startRegistro(){
        //id fk_usuario cod_viagem
        $codigo_viagem = md5(time());
        $this->executeQuery("INSERT INTO registro_ponto (id, fk_usuario, cod_viagem) VALUES (DEFAULT,{$_SESSION['usuario_id']},'{$codigo_viagem}')");
        $_SESSION['id_rota'] = mysqli_insert_id($this->getConn());
    }

    public function logoutMobile(){


    }


}
