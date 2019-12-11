<?php
session_start();
$_SESSION['msg'] = "Deslogado com sucesso.";
unset($_SESSION['id'], $_SESSION['login']);
header('Location: tela_login.php');
session_destroy();
exit();