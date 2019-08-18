<?php

require_once "Site.class.php";

class Diarias extends Site {

	public $id;
	public $fk_usuario;
	public $fk_inicial;
	public $hora_inicio;
	public $hora_inicio_intervalo;
	public $hora_fim_intervalo;
	public $inicio_parada_um;
	public $fim_parada_um;
	public $inicio_parada_dois;
	public $fim_parada_dois;
	public $hora_fim;
	public $fk_diaria;
	public $fk_mtivo_parada_um;
	public $fk_motivo_parada_dois;


	public function getid(){
		return $this->id;
		$sql = "SELECT id FROM registro_ponto";

	}

	public function getfk_usuario(){
		return $this->fk_usuario;
		$sql = "SELECT fk_usuário FROM registro_ponto";

	}

	public function setfk_usuario($fk_usuario){
		$this->fk_usuario = $fk_usuario
		return $this;
		$sql = "SELECT fk_usuario FROM registro_ponto";

	}

	public function getfk_inicial(){
		return $this->fk_inicial;
		$sql = "SELECT fk_inicial FROM registro_ponto";

	}

	public function setfk_inicial($fk_inicial){
		$this->fk_inicial = $fk_inicial;
		return $this;
		$sql = "SELECT fk_inicial FROM registro_ponto";

	}

	public function gethora_inicio(){
		return $this->hora_inicio;
		$sql = "SELECT hora_inicio FROM registro_ponto";

	}

	public function sethora_inicio($hora_inicio){
		$this->hora_inicio = $hora_inicio;
		return $this;
		$sql = "SELECT hora_inicio FROM registro_ponto";

	}

	public function gethora_inicio_intervalo(){
		return $this->hora_inicio_intervalo;
		$sql = "SELECT hora_inicio_intervalo FROM registro_ponto";

	}

	public function sethora_inicio_intervalo($hora_inicio_intervalo){
		$this->hora_inicio_intervalo = $hora_inicio_intervalo;
		return $this;
		$sql = "SELECT hora_inicio_intervalo FROM registro_ponto";

	}

	public function gethora_fim_intervalo(){
		return $this->hora_fim_intervalo;
		$sql = "SELECT hora_fim_intervalo FROM registro_ponto";

	}

	public function sethora_fim_intervalo($hora_fim_intervalo){
		$this->hora_fim_intervalo = $hora_fim_intervalo;
		return $this;
		$sql = "SELECT hora_fim_intervalo FROM registro_ponto";

	}

	public function getinicio_parada_um(){
		return $this->inicio_parada_um;
		$sql = "SELECT inicio_parada_um FROM registro_ponto";

	}

	public function setinicio_parada_um($inicio_parada_um){
		$this->inicio_parada_um = $inicio_parada_um;
		return $this;
		$sql = "SELECT inicio_parada_um FROM registro_ponto";

	}

	public function getfim_parada_um(){
		return $this->fim_parada_um;
		$sql = "SELECT fim_parada_um FROM registro_ponto";

	}

	public function setfim_parada_um($fim_parada_um){
		$this->fim_parada_um = $fim_parada_um;
		return $this;
		$sql = "SELECT fim_parada_um FROM registro_ponto";

	}

	public function getinicio_parada_dois(){
		return $this->inicio_parada_dois;
		$sql = "SELECT inicio_parada_dois FROM registro_ponto";

	}

	public function setinicio_parada_dois($inicio_parada_dois){
		$this->inicio_parada_dois = $inicio_parada_dois;
		return $this;
		$sql = "SELECT inicio_parada_dois FROM registro_ponto";

	}

	public function getfim_parada_dois(){
		return $this->fim_parada_dois;
		$sql = "SELECT fim_parada_dois FROM registro_ponto";

	}

	public function setfim_parada_dois($fim_parada_dois){
		$this->fim_parada_dois = $fim_parada_dois;
		return $this;
		$sql = "SELECT fim_parada_dois FROM registro_ponto";

	}

	public function gethora_fim(){
		return $this->hora_fim;
		$sql = "SELECT hora_fim FROM registro_ponto";

	}

	public function sethora_fim($hora_fim){
		$this->hora_fim = $hora_fim;
		return $this->hora_fim;
		$sql = "SELECT hora_fim FROM registro_ponto";

	}

	public function getfk_diaria(){
		return $this->fk_diaria;
		$sql = "SELECT fk_diaria FROM registro_ponto";

	}

	public function setfk_diaria($fk_diaria){
		$this->fk_diaria = $fk_diaria;
		return $this->fk_diaria;
		$sql = "SELECT fk_diaria FROM registro_ponto";

	}

	public function getfk_motivo_parada_um(){
		return $this->fk_motivo_parada_um;
		$sql = "SELECT fk_motivo_parada_um FROM registro_ponto";

	}

	public function setfk_motivo_parada_um($fk_motivo_parada_um){
		$this->fk_motivo_parada_um = $fk_motivo_parada_um;
		return $this->fk_motivo_parada_um;
		$sql = "SELECT fk_motivo_parada_um FROM registro_ponto";

	}

	public function getfk_motivo_parada_dois(){
		return $this->fk_motivo_parada_dois;
		$sql = "SELECT fk_motivo_parada_dois FROM registro_ponto";

	}

	public function setfk_motivo_parada_dois($fk_motivo_parada_dois){
		$this->fk_motivo_parada_dois = $fk_motivo_parada_dois;
		return $this->fk_motivo_parada_dois;
		$sql = "SELECT fk_motivo_parada_dois FROM registro_ponto";

	}

}