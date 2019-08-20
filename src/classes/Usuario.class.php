<?php

require_once 'Autoload.class.php';


class Usuario extends Site {

    protected $id;
    protected $usuario;
    protected $email;
    protected $senha;
    protected $cadastro;
    protected $nome;
    protected $rg;
    protected $cpf;
    protected $endereco;
    protected $estado;
    protected $cidade;
    protected $bairro;
    protected $telefone;
    protected $data_admissao;
    protected $data_nascimento;
    protected $cnh;
    protected $vencimento_cnh;
    protected $mopp;
    protected $vencimento_mopp;
    protected $data_cadastro;
    protected $tipo_usuario;
    protected $previlegio;
    protected $online;

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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCadastro()
    {
        return $this->cadastro;
    }

    /**
     * @param mixed $cadastro
     * @return Usuario
     */
    public function setCadastro($cadastro)
    {
        $this->cadastro = $cadastro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     * @return Usuario
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     * @return Usuario
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     * @return Usuario
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     * @return Usuario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return Usuario
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     * @return Usuario
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     * @return Usuario
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataAdmissao()
    {
        return $this->data_admissao;
    }

    /**
     * @param mixed $data_admissao
     * @return Usuario
     */
    public function setDataAdmissao($data_admissao)
    {
        $this->data_admissao = $data_admissao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * @param mixed $data_nascimento
     * @return Usuario
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnh()
    {
        return $this->cnh;
    }

    /**
     * @param mixed $cnh
     * @return Usuario
     */
    public function setCnh($cnh)
    {
        $this->cnh = $cnh;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVencimentoCnh()
    {
        return $this->vencimento_cnh;
    }

    /**
     * @param mixed $vencimento_cnh
     * @return Usuario
     */
    public function setVencimentoCnh($vencimento_cnh)
    {
        $this->vencimento_cnh = $vencimento_cnh;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMopp()
    {
        return $this->mopp;
    }

    /**
     * @param mixed $mopp
     * @return Usuario
     */
    public function setMopp($mopp)
    {
        $this->mopp = $mopp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVencimentoMopp()
    {
        return $this->vencimento_mopp;
    }

    /**
     * @param mixed $vencimento_mopp
     * @return Usuario
     */
    public function setVencimentoMopp($vencimento_mopp)
    {
        $this->vencimento_mopp = $vencimento_mopp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param mixed $data_cadastro
     * @return Usuario
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * @param mixed $tipo_usuario
     * @return Usuario
     */
    public function setTipoUsuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrevilegio()
    {
        return $this->previlegio;
    }

    /**
     * @param mixed $previlegio
     * @return Usuario
     */
    public function setPrevilegio($previlegio)
    {
        $this->previlegio = $previlegio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * @param mixed $online
     * @return Usuario
     */
    public function setOnline($online)
    {
        $this->online = $online;
        return $this;
    }


    /**
     * Função de cadastro de usuários
     * @return true ou false
     */
    public function cadastrarUsuario(){

    $sql = "INSERT INTO `usuario` (`usuario_id`, `usuario`, `email`, `senha`, `cadastro`, `nome`, `rg`, `cpf`, `endereco`, `estado`, `cidade`, `bairro`, `telefone`, `data_admissao`, `data_nascimento`, `cnh`, `venc_cnh`, `mopp`, `venc_mopp`, `data_cadastro`, `tipo_usuario`, `previlegio`, `online`) VALUES
(DEFAULT, '{$this->usuario}', '{$this->email}', '{$this->senha}', '{$this->cadastro}', '{$this->nome}', '{$this->rg}', '{$this->cpf}', '{$this->endereco}', '{$this->estado}', '{$this->cidade}', '{$this->bairro}', '{$this->telefone}', '{$this->data_admissao}', '{$this->data_nascimento}', '{$this->cnh}', '{$this->vencimento_cnh}', '{$this->mopp}', '{$this->vencimento_mopp}', '".date("Y-m-d H:i:s")."', '{$this->tipo_usuario}', {$this->previlegio}, 1);";

        $this->executeQuery($sql);
    }

    /**
     * Função de atualizar de usuários
     * @return true ou false
     */
    public function atualizarUsuario(){


    }

    /**
     * Função para deletar usuários
     * @return true ou false
     */
    public function deletarUsuario(){


    }




}