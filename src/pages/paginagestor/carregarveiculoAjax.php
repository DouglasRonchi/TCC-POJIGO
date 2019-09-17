<?php
require_once '../../classes/Autoload.class.php';
// Cria a conexão:
$conn = new Site;

$frota = $_POST['frota'];

$resultado = '';

$query = $conn->executeQuery("SELECT vei.frota, vei.placa, vei.chassi, vei.renavam, vei.capacidade_tanque, vei.ano_fab, vei.ano_mod, vei.capacidade_carga, m.modelo, ma.marca FROM veiculos vei JOIN modelo_veiculo m ON m.id = vei.fk_modelo JOIN marca_veiculo ma ON ma.id = m.fk_marca WHERE frota = {$frota}");

$row_veiculo = mysqli_fetch_assoc($query);

$resultado .= '<dl class="row">';

$resultado .= '<dt class="col-sm-3">Frota</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['frota'].'</dd>';

$resultado .= '<dt class="col-sm-3">Marca</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['marca'].'</dd>';

$resultado .= '<dt class="col-sm-3">Modelo</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['modelo'].'</dd>';

$resultado .= '<dt class="col-sm-3">Placa</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['placa'].'</dd>';

$resultado .= '<dt class="col-sm-3">Ano de Fabricação</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['ano_fab'].'</dd>';

$resultado .= '<dt class="col-sm-3">Ano Modelo</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['ano_mod'].'</dd>';

$resultado .= '<dt class="col-sm-3">Chassi</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['chassi'].'</dd>';

$resultado .= '<dt class="col-sm-3">Renavam</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['renavam'].'</dd>';

$resultado .= '<dt class="col-sm-3">Capacidade do Tanque</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['capacidade_tanque'].'</dd>';

$resultado .= '<dt class="col-sm-3">Capacidade da Carga</dt>';
$resultado .= '<dd class="col-sm-9">'.$row_veiculo['capacidade_carga'].'</dd>';


$resultado .= '</dl>';

echo $resultado;