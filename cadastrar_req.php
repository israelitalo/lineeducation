<?php
session_start();
include 'verifica_usuario_logado.php';
include("conexao.php");

$matricula = $_POST['req_fun_matricula'];
$tipo_req = $_POST['req_tipo_req'];
$descricao = $_POST['req_descricao'];
$despacho = $_POST['req_despacho'];
$entrada = $_POST['req_entrada'];
$deferimento = $_POST['req_deferimento'];
$volta = $_POST['req_volta'];

$sql = "select count(*) as total from funcionario where fun_matricula = '$matricula'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 0) {
	$_SESSION['msg'] = "Nº de matrícula inválido";
	header('Location: cadastro_de_req.php');
	exit;
}

$sql = "INSERT INTO requerimento ( req_fun_matricula, req_despacho, req_descricao, req_entrada, req_deferimento, req_volta, req_tipo_req) VALUES ('$matricula', '$despacho', '$descricao','$entrada', '$deferimento', '$volta', 'req_tipo_req')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	header('Location: cadastro_de_req.php');
exit;
}

$conexao->close();

?>