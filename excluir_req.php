<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include 'conexao.php';

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM requerimento WHERE req_id = '$id'";
        $stmt = mysqli_query($conexao, $sql);
        $row = mysqli_num_rows($stmt);

        if($row > 0){
            $sql = "DELETE FROM requerimento WHERE req_id = '$id'";
            $stmt = mysqli_query($conexao, $sql);
            $_SESSION['msg'] = "Requerimento excluído com sucesso.";
            header("Location: relatorio_de_req.php");
            exit;
        }
        else{
            $_SESSION['msg'] = "Faça login para realizar a exclusão.";
            header("Location: relatorio_de_req.php");
            exit;
        }
    }
?>