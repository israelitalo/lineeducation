<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!--css bootstrap-->
	<!--css criado para o projeto, serve para as telas de 'cadastro' e 'login' -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Login</title>
</head>

<body>
	<div class="container">
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
		<div class="row justify-content-center align-items-center">

			<div>
				<img class="img-fluid" src="img/logo2.png">
			</div>
			<div class="col-sm-4 justify-content-center area-form align-items-center">
				<!-- classe "login" para dar espaçamento no nome login no top e no bottom -->

				<span class="d-block text-center login">Login</span>
				
				<form action="login.php" method="POST">
					
					<div class="input-group">
						<!--input do nome do usuário -->
						<!--classe "tamanho" para diminir o tamanho dos inputs -->
						<input class="form-control tamanho" type="text" name="login" placeholder="Login" required="text">
					</div><br>

					<div class="input-group">
						<!--input da senha do usuário -->
						<input class="form-control tamanho" type="password" name="senha" placeholder="Senha" required="password">
					</div><br>	
					<!--botão de logar -->
					<button type="submint" class="btn btn-info">Entrar</button>
					<!--botão de cadstrar usuario -->
					
					<!--link redirecionador para ir a tela de cadastro -->
					<a type="submint" class="btn btn-dark link" href="cadastro_adm.php">Cadastrar Usuário</a>
					
				</form>
			</div>

		</div>
	</div>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="bootstrap.bundle.min.js"></script>
</body>
</html>