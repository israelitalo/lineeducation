<?php
    //include 'verifica_usuario_logado.php';
    include 'conexao.php';

        if(isset($_POST['matricula'])){
            $matricula = $_POST['matricula'];
            $sql = "SELECT fun_nome FROM funcionario WHERE fun_matricula = '$matricula'";
            $stmt = mysqli_query($conexao, $sql);
            if($stmt->num_rows){
                $row = mysqli_fetch_assoc($stmt);
                $resultado = $row['fun_nome'];
                echo $resultado;
            }
        }
?>