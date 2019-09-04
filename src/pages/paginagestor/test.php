<?php

$host = "pojigo.tk:3306";
$database = "pojigo_master";
$user = "pojigo";
$password = "entra21@Blusoft";
// Create connection
$conn = mysqli_connect($host, $user, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);


$horas_totais_mensais = 0;
$selectRegistrosUnicos = $conn->executeQuery("SELECT * FROM registro_ponto rp JOIN usuario us ON rp.fk_usuario = us.usuario_id WHERE us.cadastro = {$_GET['cad']} AND rp.hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}' ORDER BY rp.hora_inicio");
$rowHoras = mysqli_num_rows($selectRegistrosUnicos);
while ($rowHoras = mysqli_fetch_assoc($selectRegistrosUnicos)):


//Pega as horas e transforma em segundos
   $inicio_jornada = strtotime($rowHoras['hora_inicio']);
   $inicio_intervalo = strtotime($rowHoras['hora_inicio_intervalo']);
   var_dump($inicio_intervalo);
   $fim_intervalo = strtotime($rowHoras['hora_fim_intervalo']);
   $fim_jornada = strtotime($rowHoras['hora_fim']);
//Testa se virar o dia na viagem calcula da mesma forma as Horas
   if ($fim_jornada < $inicio_jornada) {
//Se vira o dia acrescenta mais 24 horas para realizar o cálculo
    $fim_jornada = $fim_jornada + 86400;
} else {
//nada...
}
//Pega as horas trabalhadas e desconta o intervalo
$intervalo = $fim_intervalo - $inicio_intervalo;
$horas_trabalhadas = ($fim_jornada - $inicio_jornada) - $intervalo;
//verifica as horas extras
if ($horas_trabalhadas > 28800) {
    $horasExtras = $horas_trabalhadas - 28800;
}
//setando as horas totais do período
$horas_mensais += ($horas_trabalhadas + $horasExtras);
$horaTot = sprintf("%02s", floor($horas_mensais / (60 * 60)));
$horas_mensais = ($horas_mensais % (60 * 60));
$minutoTot = sprintf("%02s", floor($horas_mensais / 60));
$horas_mensais = ($horas_mensais % 60);
$horas_totais_mensais .= $horaTot;

//Arredonda para formato de Horas
$hora = sprintf("%02s", floor($horas_trabalhadas / (60 * 60)));
$horas_trabalhadas = ($horas_trabalhadas % (60 * 60));
$minuto = sprintf("%02s", floor($horas_trabalhadas / 60));
$horas_trabalhadas = ($horas_trabalhadas % 60);

$horaExtra = sprintf("%02s", floor($horasExtras / (60 * 60)));
$horasExtras = ($horasExtras % (60 * 60));
$minutoExtra = sprintf("%02s", floor($horasExtras / 60));
$horasExtras = ($horasExtras % 60);
$horas_extras = $horaExtra . ":" . $minutoExtra;

echo $hora . ":" . $minuto;

endwhile;
?>