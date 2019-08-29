<?php
require_once 'Autoload.class.php';


class Mobile extends Site {

    protected $id;

    //Iniciando o registro
    public function startRegistro(){
        //id fk_usuario cod_viagem
        $query = $this->executeQuery("SELECT cod_viagem FROM registro_ponto ORDER BY cod_viagem DESC LIMIT 1");
        $result = mysqli_fetch_assoc($query);
        $novo_codigo = ((int)$result['cod_viagem'])+1;
        $codigo_viagem = $novo_codigo;
        $_SESSION['cod_viagem'] = $codigo_viagem;
        $this->executeQuery("INSERT INTO registro_ponto (id, fk_usuario, cod_viagem) VALUES (DEFAULT,{$_SESSION['usuario_id']},'{$codigo_viagem}')");
        $_SESSION['id_rota'] = mysqli_insert_id($this->getConn());
    }

    public function logoutMobile(){


    }


}