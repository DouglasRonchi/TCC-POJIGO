<?php

require_once '../../classes/Autoload.class.php';
$conn = New Site;

// //Recebe os dados
$id = $_POST['id'];

$selectDestino = $conn->executeQuery("SELECT * FROM rotas JOIN cidades ON cidades.id = rotas.fk_cidade_destino WHERE rotas.id = {$id}");
$row = mysqli_num_rows($selectDestino);

while ($row = mysqli_fetch_assoc($selectDestino)) {
    echo "<option value='" . $row['id'] . "'>" . $row['nome_cidade'] . "</option>";
}
