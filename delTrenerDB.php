<?php
include "header.php";
$delID = $_GET['idTrener'];

$q_delTrener = "DELETE FROM `users` WHERE `id_user` = '$delID';";
$exe_delTrener = $con->query($q_delTrener);

header('Location: editTrener.php');
?>