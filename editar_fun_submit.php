<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include 'conexao.php';

    //Garantindo que a matricula não venha vazia.
    if(!empty($_POST['fun_matricula'])){
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

        $sql = "UPDATE funcionario SET fun_nome = '$nome', fun_celular = '$celular', fun_rg = '$rg', fun_cpf = '$cpf', fun_cargo = '$cargo', fun_local_trabalho = '$local_trabalho', fun_rua = '$rua', fun_numero = '$numero', fun_bairro = '$bairro', fun_cidade = '$cidade', fun_estado = '$estado' WHERE fun_matricula = '$matricula'";

        if($stmt = mysqli_query($conexao, $sql)){
            $_SESSION['msg'] = "Funcionário alterado com sucesso.";
            header("Location: relatorio_de_fun.php");
            exit;
        }else{
            $_SESSION['msg'] = "Erro ao alterar dados do funcionário ".$nome;
            header("Location: editar_form_fun.php");
            exit;
        }
    }
    else{
        $_SESSION['msg'] = "Erro ao alterar dados do funcionário ".$nome;
        header("Location: editar_form_fun.php");
        exit;
    }
?>