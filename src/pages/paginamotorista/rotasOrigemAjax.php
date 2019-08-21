<?php

require_once '../../classes/Autoload.class.php';
$conn = New Site;

// //Recebe os dados
$id = $_POST['id'];

$selectOrigem = $conn->executeQuery("SELECT * FROM rotas JOIN cidades ON cidades.id = rotas.fk_cidade_origem WHERE rotas.id = {$id}");
$row = mysqli_num_rows($selectOrigem);

while ($row = mysqli_fetch_assoc($selectOrigem)) {
    echo "<option value='" . $row['id'] . "'>" . $row['nome_cidade'] . "</option>";
}
