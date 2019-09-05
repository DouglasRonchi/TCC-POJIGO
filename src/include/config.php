<?php
if (!isset($_SESSION)){
    require_once '../classes/Site.class.php';
    header('Location: '.Site::path('index.php').'');
}
	/** 
	 * CONFIGURAÇÕES
	 * Algumas definições globais, exemplo: timezone, constantes...
     *
	 */

	//TimeZone
    date_default_timezone_set('America/Sao_Paulo');


?>