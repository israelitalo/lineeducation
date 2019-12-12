<?php
    /*
     * Não está funcionando
     * */
    session_start();
    include 'verifica_usuario_logado.php';
    include 'conexao.php';

    function retorna($req_fun_matricula, $conexao){
        $sql = "SELECT fun_nome FROM funcionario WHERE fun_matricula = '$req_fun_matricula' LIMIT 1";
        $stmt = mysqli_query($conexao, $sql);
        if($stmt->num_rows){
            $row = mysqli_fetch_assoc($stmt);
            $valores['nome_funcionario'] = $row['fun_nome'];
        }else{
            $valores['nome_funcionario'] = "Funcionário não cadastrado";
        }
        return jason_encode($valores);
    }

    if(isset($_GET['req_fun_matricula'])){
        echo retorna($_GET['req_fun_matricula'], $conexao);
    }

?>