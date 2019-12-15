<?php

    session_start();
    include 'verifica_usuario_logado.php';
    if(isset($_POST['fun_id'])){
        include 'conexao.php';

        $resultado = '';

        $sql = "SELECT * FROM funcionario WHERE fun_matricula = '".$_POST["fun_id"]."' LIMIT 1";
        $stmt = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($stmt);

        $resultado .= '<dl class="row">';

        $resultado .= '<dt class="col-sm-3">Matrícula</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_matricula'].'</dd>';

        $resultado .= '<dt class="col-sm-3">Nome</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_nome'].'</dd>';

        $resultado .= '<dt class="col-sm-3">Endereço</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_rua'];

        $resultado .= '<dt class="col-sm-3">Número</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_numero'];

        $resultado .= '<dt class="col-sm-3">Bairro</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_bairro'];

        $resultado .= '<dt class="col-sm-3">Cidade</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_cidade'];

        $resultado .= '<dt class="col-sm-3">Estado</dt>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_estado'];

        /*$resultado .= '<dl>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_numero'].'</dd>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_bairro'].'</dd>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_cidade'].'</dd>';
        $resultado .= '<dd class="col-sm-9">'.$row['fun_estado'].'</dd>';
        $resultado .= '</dl>';
        $resultado .= '</dd>';
        $resultado .= '</dl>';*/

        echo $resultado;
    }
?>