<?php
$selectUsu = $conn->executeQuery("SELECT * FROM usuario");
$row = mysqli_num_rows($selectUsu);
while ($usu = mysqli_fetch_assoc($selectUsu)):
?>

<option value="<?= $usu['cadastro'] ?>"><?= $usu['cadastro']?> - <?= utf8_encode($usu["nome"]) ?></option>

<?php endwhile; ?>