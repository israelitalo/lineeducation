<?php
session_start();
include 'verifica_usuario_logado.php';
include("conexao.php");

$nome = $_POST['fun_nome'];
$matricula = $_POST['fun_matricula'];
$celular = $_POST['fun_celular'];
$rg = $_POST['fun_rg'];
$cpf = $_POST['fun_cpf'];
$cargo = $_POST['fun_cargo'];
$local_trabalho = $_POST['fun_local_trabalho'];
$rua = $_POST['fun_rua'];
$bairro = $_POST['fun_bairro'];
$cidade = $_POST['fun_cidade'];
$estado = $_POST['fun_estado'];
$numero = $_POST['fun_numero'];

$sql = "SELECT fun_matricula FROM funcionario where fun_matricula = '$matricula'";
$result = mysqli_query($conexao, $sql) OR die(mysqli_error($conexao));
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro_de_fun.html');
	exit;
}

$sql = "INSERT INTO funcionario (fun_matricula, fun_nome, fun_celular, fun_rg, fun_cpf, fun_cargo, fun_local_trabalho, fun_rua, fun_bairro, fun_cidade, fun_estado, fun_numero) 
VALUES ('$matricula','$nome','$celular','$rg','$cpf','$cargo','$local_trabalho','$rua','$bairro','$cidade','$estado', '$numero')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
header('Location: cadastro_de_fun.html');
exit;
}

$conexao->close();


?>