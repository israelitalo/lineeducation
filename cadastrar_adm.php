<?php
session_start();
include 'verifica_usuario_logado.php';
include("conexao.php");

$adm_login = $_POST['login'];
$adm_senha = md5($_POST['senha']);

$sql = "select count(*) as total from adm where adm_login = '$adm_login' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro_adm.php');
	exit;
}

$sql = "INSERT INTO adm (adm_login, adm_senha) VALUES ('$adm_login','$adm_senha')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	header('Location: cadastro_adm.php');
	exit;
}

$conexao->close();

?>