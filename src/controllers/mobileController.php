<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;


if (isset($_POST['btnFrotaOk'])) {
    $id_rota = $_SESSION['id_rota'];
    $frota = $_POST['textview'];
    $query = $conn->executeQuery("SELECT id FROM veiculos WHERE frota = {$frota}");
    $id_frota = mysqli_fetch_assoc($query);
    $conn->executeQuery("UPDATE registro_ponto SET fk_veiculo = {$id_frota['id']} WHERE id = {$id_rota}");

    header('Location: ../pages/paginamotorista/login.php');

} else if (isset($_POST['btnRotaOk'])) {
    $id_rota = $_SESSION['id_rota'];
    $rota = $_POST['inputRota'];
    $conn->executeQuery("UPDATE registro_ponto SET fk_rota = {$rota} WHERE id = {$id_rota}");

    header('Location: ../pages/paginamotorista/login.php');
} else if (isset($_POST['btnInicioViagem'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("UPDATE registro_ponto SET hora_inicio = NOW() WHERE id = {$id_rota}");
    header('Location: ../pages/paginamotorista/index_motorista.php');
} else if (isset($_POST['btnInicioIntervalo'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("UPDATE registro_ponto SET hora_inicio_intervalo = NOW() WHERE id = {$id_rota}");
    header('Location: ../pages/paginamotorista/intervalo.php');
} else if (isset($_POST['btnFimIntervalo'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("UPDATE registro_ponto SET hora_fim_intervalo = NOW() WHERE id = {$id_rota}");
    header('Location: ../pages/paginamotorista/index_motorista.php');
} else if (isset($_POST['btnFimViagem'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("UPDATE registro_ponto SET hora_fim = NOW() WHERE id = {$id_rota}");

    //calcular quilometragem total
    $query = $conn->executeQuery("SELECT * FROM coordenadas WHERE fk_cod_viagem = {$id_rota} ORDER BY ASC LIMIT 1");
    while ($row = mysqli_num_rows($query)) {
        $pontoInicial = $row['latitude'] . "," . $row['longitude'];
    }
    $query = $conn->executeQuery("SELECT * FROM coordenadas WHERE fk_cod_viagem = {$id_rota} ORDER BY DESC LIMIT 1");
    while ($row = mysqli_num_rows($query)) {
        $pontoFinal = $row['latitude'] . "," . $row['longitude'];
    }


    header('Location: ../pages/paginamotorista/login.php?fim=true');


} else if (isset($_GET['motivo'])) {
    $id_rota = $_SESSION['id_rota'];
    $motivo = $_GET['motivo'];
    if (!isset($_SESSION['parada1'])) {
        $conn->executeQuery("UPDATE registro_ponto SET inicio_parada_um = NOW() WHERE id = {$id_rota}");
        $conn->executeQuery("UPDATE registro_ponto SET fk_motivo_parada_um = {$motivo} WHERE id = {$id_rota}");
        header('Location: ../pages/paginamotorista/parada.php?n=1');
    } else {
        $conn->executeQuery("UPDATE registro_ponto SET inicio_parada_dois = NOW() WHERE id = {$id_rota}");
        $conn->executeQuery("UPDATE registro_ponto SET fk_motivo_parada_dois = {$motivo} WHERE id = {$id_rota}");
        header('Location: ../pages/paginamotorista/parada.php');
    }


} else if (isset($_POST['btnFimParada1'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("UPDATE registro_ponto SET fim_parada_um = NOW() WHERE id = {$id_rota}");
    $_SESSION['parada1'] = true;
    header('Location: ../pages/paginamotorista/index_motorista.php');

} else if (isset($_POST['btnFimParada2'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("UPDATE registro_ponto SET fim_parada_dois = NOW() WHERE id = {$id_rota}");
    header('Location: ../pages/paginamotorista/index_motorista.php');

} else if (isset($_POST['logoutMobile'])) {
    $id_rota = $_SESSION['id_rota'];
    $conn->executeQuery("DELETE FROM registro_ponto WHERE id = {$id_rota}");
    session_destroy();
    header('Location: ../../login.php');
}





