<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include_once 'conexao.php';

    if(isset($_GET['matricula'])){
        $matricula = $_GET['matricula'];

        $sql = "SELECT fun_matricula FROM funcionario WHERE fun_matricula = '$matricula'";
        $stmt = mysqli_query($conexao, $sql);
        $row = mysqli_num_rows($stmt);

        if($row > 0){
            $sql = "DELETE FROM funcionario WHERE fun_matricula = '$matricula'";
            $stmt = mysqli_query($conexao, $sql);
            $_SESSION['msg'] = "Funcionário excluído com sucesso.";
            header("Location: relatorio_de_fun.php");
            exit;
        }
        else{
            $_SESSION['msg'] = "Faça login para realizar a exclusão.";
            header("Location: relatorio_de_fun.php");
            exit;
        }
    }
?>