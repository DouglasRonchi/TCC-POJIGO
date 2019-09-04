<?php
require_once 'Autoload.class.php';


class Login extends Site {
    protected $user;
    protected $senha;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Login
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     * @return Login
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }



    public function Logar(){
        $logar = $this->executeQuery("SELECT * FROM usuario WHERE usuario = '{$this->getUser()}' AND senha = '{$this->getSenha()}'");
        if (mysqli_num_rows($logar)==1){
            $_SESSION['logado'] = true;
            $query = $this->executeQuery("SELECT * FROM usuario WHERE usuario = '{$this->getUser()}'");
            $usuario = mysqli_fetch_assoc($query);
            $_SESSION['usuario_id'] = $usuario['usuario_id'];
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['cadastro'] = $usuario['cadastro'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['rg'] = $usuario['rg'];
            $_SESSION['cpf'] = $usuario['cpf'];
            $_SESSION['endereco'] = $usuario['endereco'];
            $_SESSION['estado'] = $usuario['estado'];
            $_SESSION['cidade'] = $usuario['cidade'];
            $_SESSION['bairro'] = $usuario['bairro'];
            $_SESSION['telefone'] = $usuario['telefone'];
            $_SESSION['data_admissao'] = $usuario['data_admissao'];
            $_SESSION['data_nascimento'] = $usuario['data_nascimento'];
            $_SESSION['cnh'] = $usuario['cnh'];
            $_SESSION['venc_cnh'] = $usuario['venc_cnh'];
            $_SESSION['mopp'] = $usuario['mopp'];
            $_SESSION['venc_mopp'] = $usuario['venc_mopp'];
            $_SESSION['data_cadastro'] = $usuario['data_cadastro'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
            $_SESSION['previlegio'] = $usuario['previlegio'];
            $_SESSION['online'] = $usuario['online'];
            $_SESSION['foto'] = $usuario['foto_perfil'];
            header('Location: ../../redirect.php');
        } else {
            //Alerta Usuário ou senha inválidos
            setcookie('inv',"true",time()+5,"/");
            $_COOKIE['inv'] = true;
            header('Location: ../../index.php');
        }
    }

    public function VerificarLogin(){
        if (!isset($_SESSION) || $_SESSION['logado']==false){
            header('Location: /TCC-POJIGO/dashboard.php');
            //alerta Acesso Restrito
        }


    }

    public function Logout()
    {
        session_destroy();
        header('Location: ../../index.php');
    }

}