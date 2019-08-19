<?php
require_once '../../classes/Site.class.php';
// Cria a conexão:
$conn = new Site;

// //Recebe os dados
$id = $_POST['id'];

$selectModelo = $conn->executeQuery("SELECT * FROM marca_veiculo JOIN modelo_veiculo ON modelo_veiculo.fk_marca = marca_veiculo.id WHERE marca_veiculo.id = '$id'");
$row = mysqli_num_rows($selectModelo);

while ($row = mysqli_fetch_assoc($selectModelo)){
        echo "<option value='".$row['id']."'>".$row['modelo']."</option>";
      }
