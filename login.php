<?php
session_start();
include("conexao.php");

if (empty($_POST['login']) || empty($_POST['senha'])) {
	header('Location: tela_login.php');
	exit();
}

$adm_login = $_POST['login'];
$adm_senha = $_POST['senha'];

$query = "SELECT adm_id, adm_login, adm_senha FROM adm WHERE adm_login = '{$adm_login}' AND adm_senha = md5('{$adm_senha}')";
$result = mysqli_query($conexao, $query);
$stmt = mysqli_fetch_assoc($result);
$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['id'] = $stmt['adm_id'];
    $_SESSION['login'] = $stmt['adm_login'];
    $_SESSION['msg'] = "Bem vindo, ".$_SESSION['login']."!";
	header('Location: index.php');
	exit();
}else{
	$_SESSION['msg'] = "Login ou senha incorretos.";
	header('Location: tela_login.php');
	exit();
}

?>