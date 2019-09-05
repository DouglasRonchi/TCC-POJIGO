<?php
if (!isset($_SESSION)){
    require_once '../classes/Site.class.php';
    header('Location: '.Site::path('index.php').'');
}
	/** 
	 * FUNÇÕES
	 * Funções personalizadas do projeto ficarão aqui.
     *
	 */



?>