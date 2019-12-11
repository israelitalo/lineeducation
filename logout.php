<?php
/*
 * Aqui não pode conter o session_destroy(), porque com ele ele não consegue chamar a msg.
 */
session_start();
$_SESSION['msg'] = "Deslogado com sucesso.";
header('Location: tela_login.php');
unset($_SESSION['id'], $_SESSION['login']);
exit();