<?php

    session_start();
    include 'verifica_usuario_logado.php';
    include 'conexao.php';

    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        $funcionario = $_POST['funcionario'];
        $tipo_req = $_POST['req_tipo_req'];
        $descricao = $_POST['req_descricao'];
        $despacho = $_POST['req_despacho'];
        $entrada = $_POST['req_entrada'];
        $deferimento = $_POST['req_deferimento'];
        $volta = $_POST['req_volta'];

        $sql = "UPDATE requerimento SET req_tipo_req = '$tipo_req', req_descricao = '$descricao',
        req_despacho = '$despacho', req_entrada = '$entrada', req_deferimento = '$deferimento', req_volta = '$volta' WHERE req_id = '$id'";

        if($stmt = mysqli_query($conexao, $sql)){
            $_SESSION['msg'] = "Requerimento alterado com sucesso.";
            header("Location: relatorio_de_req.php");
            exit;
        }
        else{
            $_SESSION['msg'] = "Erro ao alterar dados do requerimento do funcionário ".$funcionario;
            header("Location: editar_form_req.php");
            exit;
        }
    }
    else{
        $_SESSION['msg'] = "Erro ao alterar dados do requerimento do funcionário ".$nome;
        header("Location: editar_form_req.php");
        exit;
    }
?>