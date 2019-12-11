<?php
    include 'verifica_usuario_logado.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!--css bootstrap-->
	<!--css criado para o projeto, serve para as telas de 'cadastro' e 'login' -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Cadastro</title>
</head>

<body>
	<div class="container">
		
		<div class="row justify-content-center align-items-center">

			<div class="col-sm-4 justify-content-center area-form align-items-center">
				<!-- classe "login" para dar espaçamento no nome login no top e no bottom -->
				<span class="d-block text-center cadastro">Cadastre-se</span>
				
				<form action= "cadastrar_adm.php" method="POST">
					
					<div class="input-group">
						<!--input do nome do usuário -->
						<!--classe "tamanho" para diminir o tamanho dos inputs -->
						<input class="form-control tamanho" type="text" name="login" placeholder="Login" required="text">
					</div><br>

					<div class="input-group">
						<!--input da senha do usuário -->
						<input class="form-control tamanho" type="password" name="senha" placeholder="Senha" required="password">
					</div><br>	
					<!--botão de cadastrar -->
					<button type="submint" class="btn btn-info">Cadastrar-se</button>
					<!--botão de cadstrar usuario -->
					
					<!-- botão link para ir a tela de login -->
					<a type="submint" class="btn btn-dark link" href="login.php">Fazer Login</a>
					
				</form>
			</div>
			<div>
				<img class="img-fluid" src="img/logo2.png">
			</div>
		</div>
	</div>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="bootstrap.bundle.min.js"></script>
</body>
</html>