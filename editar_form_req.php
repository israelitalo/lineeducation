<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include 'conexao.php';

    if(isset($_GET['id'])){
        $req_id = $_GET['id'];

        $sql = "SELECT * FROM funcionario f, requerimento r WHERE r.req_fun_matricula = '$req_id' AND f.fun_matricula = '$req_id'";
        $stmt = mysqli_query($conexao, $sql);
        $result = mysqli_fetch_assoc($stmt);

        if(empty($result['req_fun_matricula']) || empty($result['req_id'])){
            $_SESSION['msg'] = "Dados imcompatíveis para alteração.";
            header("Location: relatorio_de_req.php");
            exit;
        }

    }else{
        $_SESSION['msg'] = "Selecione um requerimento para alterá-lo.";
        header("Location: relatorio_de_req.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/68d49f23cf.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Cadastro de Requerimento</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div height="72">
        <div class="dropdown ">
            <div class="imgProfile"> <a href="index.php"><img class="img-fluid" src="img/default.png"></a></div>
            <a href="" class="dropdown-toggle" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
        </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav">
            <li class="nav-item active" style="padding-left: 20px">
                <a class="nav-link" href="relatorio_de_req.php"><span class="sr-only">(página atual)</span></a>
            </li>
        </ul>
    </div>
</nav>
<?php
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    if($msg == "Requerimento cadastrado com sucesso."){
        echo "<div class='alert alert-info' role='alert'>$msg</div>";
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>$msg</div>";
    }
    unset($_SESSION['msg']);
}
?>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="margin-top: 10px"><!--Grid -->
        <div class="col-sm-7 justify-content-center align-items-center">
            <!--class "cabeca_relatorio_de_fun" editar estilo do cabeçalho da coluna  -->
            <!--Corpo da coluna onde fica os inputs -->
            <div class="area_de_cadastro_req">
                <div class="font-weight-normal h4 text-center">
                    Dados de Requerimento
                </div><br>
                <!--Início do Formulário-->
                <form action="editar_req_submit.php" method="POST">
                    <div class="input-group">
                        <!--input de matricula do requerente -->
                        <select class='form-control view_data' id="fun_matricula" type='number' name='req_fun_matricula' required='number' style='float: left; margin-right: auto'>
                            <option><?php echo $result['req_fun_matricula'];?></option>
                        </select>
                        <input class="form-control" id="campo_funcionario" name="nome_funcionario" type="text" placeholder="Nome do funcionário"
                               style="float: right; margin-left: 20px" disabled value="<?php echo $result['fun_nome'];?>">
                    </div><br>
                    <div class="form-group"><!--input com opções de tipo de req. -->
                        <select class="form-control" name="req_tipo_req" >
                            <option><?php echo $result['req_tipo_req'];?></option>
                            <option>FOLGA</option>
                            <option>FÉRIAS</option>
                            <option>AUMENTO SALARIAL</option>
                            <option>RENOVAÇÃO DE CONTRATO</option>
                        </select>
                    </div>
                    <div class="form-group"><!--area de texto de tap_req -->
                        <textarea class="form-control" name="req_descricao" rows="3" placeholder="Descrição" required="text"><?php echo $result['req_descricao'];?></textarea>
                    </div>
                    <div class="form-group"><!--area de texto de despacho -->
                        <textarea class="form-control" name="req_despacho" rows="3" placeholder="despacho/encaminhamento" required="text"><?php echo $result['req_despacho'];?></textarea>
                    </div>
                    <div class="input-group">
                        <!--input de entrada de req.-->
                        <span class="h5 espaco">Entrada: </span>
                        <input class="form-control tamanho_input_req2" type="date" name="req_entrada" placeholder="Entrada" required="date" value="<?php echo $result['req_entrada'];?>">
                        <!--input de deferimento de req. -->
                        <span class="h5 espaco">Deferimento: </span>
                        <input class="form-control tamanho_input_req2" type="date" name="req_deferimento" placeholder="Deferimento" required="date" value="<?php echo $result['req_deferimento'];?>">
                        <!--input de volta de req. -->
                        <span class="h5 espaco">Volta: </span>
                        <input class="form-control" type="date" name="req_volta" placeholder="Volta" required="date" value="<?php echo $result['req_volta'];?>">
                    </div><br>
                    <div class="input-group">
                        <!--Botão de salvar -->
                        <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>