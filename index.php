<?php
    session_start();
    include 'verifica_usuario_logado.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Home</title>
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
						<a class="nav-link" href="">Home<span class="sr-only">(página atual)</span></a>
					</li>
				</ul>
			</div>
		</nav>
        <?php
        if(isset($_SESSION['msg'])){
            $mensagem = $_SESSION['msg'];
            if($mensagem == "Login ou senha incorretos."){
                echo "<div class='alert alert-danger' role='alert'>$mensagem</div>";
                echo "<br/>";
                unset($_SESSION['msg']);
            }
            else{
                echo "<div class='alert alert-primary' role='alert'>$mensagem</div>";
                echo "<br/>";
                unset($_SESSION['msg']);
            }
        }
        ?>
		<div class="container-fluid d-flex justify-content-center">
			<div class="row justify-content-center align-items-center " style="margin-top: 10px">
				<div class="col-sm-6 justify-content-center align-items-center"><!--coluna de funcionario-->
					<div class="cabeca_index"><!--titulo da box -->		
					 	<button class="btn btn-primary" ><img src="img/funconario.png" style="padding-right: 20px"><span>Funcionario</span></button>
					</div>	
					<div class="area_mensagem"><!--area de botoes funcionario -->
						<a class="btn btn-primary largura" href="cadastro_de_fun.php">Cadastro de Funcionario</a>
						<a class="btn btn-primary largura" href="relatorio_de_fun.php">Relatório de Funcionario</a>
					</div>
				</div><!--final da coluna de funcinario -->
				<div class="col-sm-6 justify-content-center align-items-center"><!--coluna de requerimento-->					
					<div class="cabeca_index"><!--titulo da box -->			
					 	<button class="btn btn-success" ><img src="img/requerimento.png" style="padding-right: 20px"><span>Requerimento</span></button>
					</div>	
					<div class="area_mensagem"><!--area de botoes requerimento-->
						<a class="btn btn-success largura" href="cadastro_de_req.php">Cadastro de Requerimento</a>
						<a class="btn btn-success largura" href="relatorio_de_req.php">Relatório de  Requerimento</a>
					</div>
				</div><!--final da coluna de requerimento -->
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>