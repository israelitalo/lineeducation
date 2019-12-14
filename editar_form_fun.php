<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include_once 'conexao.php';

    if(!empty($_GET['matricula'])){
        $matricula = $_GET['matricula'];

        $sql = "SELECT * FROM funcionario WHERE fun_matricula = '$matricula'";
        $stmt = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($stmt);

        if(empty($row['fun_matricula']) || empty($row['fun_nome'])){
            $_SESSION['msg'] = "Dados imcompatíveis para alteração.";
            header("Location: relatorio_de_fun.php");
        }

    }else{
        $_SESSION['msg'] = "Escolha um funcionário para alterá-lo.";
        header("Location: relatorio_de_fun.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/68d49f23cf.js" crossorigin="anonymous"></script>
    <title>Alteração de Funcionário</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div height="72">
        <div class="dropdown ">
            <div class="imgProfile"> <a href="inicio.php"><img class="img-fluid" src="img/default.png"></a></div>
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
                <a class="nav-link" href="">Cadastro de Funcionário<span class="sr-only">(página atual)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center"><!--Grid -->
        <div class="col-sm-7 justify-content-center align-items-center">
            <?php
            if(isset($_SESSION['msg'])){
                $msg = $_SESSION['msg'];
                if($msg == "Funcionário alterado com sucesso."){
                    echo "<div class='alert alert-info' role='alert'>$msg</div>";
                }
                else{
                    echo "<div class='alert alert-danger' role='alert'>$msg</div>";
                }
                unset($_SESSION['msg']);
            }
            ?>
            <!--Corpo da coluna onde fica os inputs -->
            <div class="area_de_cadastro_fun">
                <form action="editar_fun_submit.php" method="POST"><!--formulario com metodo de envio por POST -->
                    <div class="font-weight-normal h4 text-center">
                        Dados Pessoais
                    </div><br>
                    <div class="input-group">
                        <!--Input de nome -->
                        <input class="form-control" type="text" name="fun_nome" placeholder="Nome" required="text" value="<?php echo $row['fun_nome'];?>">
                    </div><br>
                    <div class="input-group">
                        <!--Input de matricula -->
                        <input type="hidden" name="fun_matricula" value="<?php echo $row['fun_matricula'];?>">
                        <input class="form-control" type="number" name="fun_matricula" placeholder="Matrícula" required="number" value="<?php echo $matricula;?>" disabled>
                        <!--Input de telefone -->
                        <input class="form-control" type="text" name="fun_celular" placeholder="Celular" required="text" style="margin-left: 20px" value="<?php echo $row['fun_celular'];?>">
                    </div><br>
                    <div class="input-group">
                        <!--Input de RG -->
                        <input class="form-control" type="text" name="fun_rg" placeholder="RG" required="text" value="<?php echo $row['fun_rg'];?>">
                        <!--Input de CPF -->
                        <input class="form-control" type="text" name="fun_cpf" placeholder="CPF" required="text" style="margin-left: 20px" value="<?php echo $row['fun_cpf'];?>">
                    </div><br>
                    <div class="input-group">
                        <!--Input de local de trabalho do funcionário -->
                        <input class="form-control" type="text" name="fun_local_trabalho" placeholder="Local de trabalho" required="text" value="<?php echo $row['fun_local_trabalho'];?>">
                        <!--Input de cargo do funcionário -->
                        <input class="form-control" type="text" name="fun_cargo" placeholder="Cargo" required="text" style="margin-left: 20px" value="<?php echo $row['fun_cargo'];?>">
                    </div><br>
                    <div class="font-weight-normal h4 text-center">
                        Endereço
                    </div><br>
                    <div class="input-group">
                        <!--Input de endereço do funcionário -->
                        <input class="form-control" type="text" name="fun_rua" placeholder="Rua" required="text" value="<?php echo $row['fun_rua'];?>">
                    </div><br>
                    <div class="input-group">
                        <!--Input de endereço do funcionário -->
                        <input class="form-control" type="text" name="fun_numero" placeholder="Número" required="text" value="<?php echo $row['fun_numero'];?>">
                        <input class="form-control" type="text" name="fun_bairro" placeholder="Bairro" required="text" style="margin-left: 20px" value="<?php echo $row['fun_bairro'];?>">
                    </div><br>
                    <div class="input-group">
                        <!--Input de endereço do funcionário -->
                        <input class="form-control" type="text" name="fun_cidade" placeholder="Cidade" required="text" value="<?php echo $row['fun_cidade'];?>">
                        <input class="form-control" type="text" name="fun_estado" placeholder="Estado" required="text" style="margin-left: 20px" value="<?php echo $row['fun_estado'];?>">
                    </div><br>
                    <div>
                        <!--Botão de salvar -->
                        <button type="submit" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Editar</button>
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