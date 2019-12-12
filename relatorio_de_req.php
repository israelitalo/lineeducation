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
		<title>Relatório de Requerimento</title>
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
						<a class="nav-link" href="">Relatório de Requerimento<span class="sr-only">(página atual)</span></a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container-fluid">
			
			<div class="row justify-content-center align-items-center"><!--Grid -->
				<div class="col-sm-12 justify-content-center align-items-center">
					<!--class "cabeca_relatorio_de_req" editar estilo do cabeçalho da coluna  -->
					
					<!--Corpo da coluna onde fica os relatorio -->
					<div class="area_de_relatorio_req">
						<div class="font-weight-normal h4 text-center">
							Relatório de Requerimento
						</div><br>
						<div>
							<form method="POST">
								<!-- class formulario_alinhamento para alinhar a div no centro -->
								<div class="input-group formulario_alinhamento">
									<div>
										<!-- class InputMatricula para dar um estilo a mais para o input -->
										<input class="InputMatricula" type="text" name="" placeholder="Busca por Matricula">
										<button type="submit" class="btn btn-light tamanho_botao"><img src="img/search.png"></button><!--class tamanho_botao para dar estilo ao botao-->
									</div>

									<div style="margin-left: 50px">
										<!-- class InputMatricula para dar um estilo a mais para o input -->
										<input class="InputMatricula" type="text" name="" placeholder="Busca por Número">
										<button type="submit" class="btn btn-light tamanho_botao"><img src="img/search.png"></button><!--class tamanho_botao para dar estilo ao botao-->
									</div>	
									<div style="margin-left: 50px">
										<!--Botão de editar -->
										<button type="submit" class="btn btn-primary"><img src="img/edit.png" style="padding-right: 10px"><span>Editar</span></button>
										
										<!--Botão de excluir -->
										<button type="submit" class="btn btn-danger"><img src="img/delete.png" style="padding-right: 10px"><span>Excluir</span></button>
											
										<!--botao de imprimir -->
										<button type="submit" class="btn btn-secondary"><img src="img/print.png" style="padding-right: 10px"><span>Imprimir</span></button>
									</div>
								</div>
							</form>
						</div>
						<div class="table-responsive"><!--tabela de relatorio -->
			              <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
			              	<!-- -->
			                <thead class="thead-dark">
			                  <tr>
			                  	<th>Matricula</th>
			                  	<th>Nome</th>
			                    <th>Local de Trabalho</th>
			                    <th>RG</th>
			                    <th>Código</th>
			                    <th>Requerimento</th>
			                    <th>Solicitação</th>
			                    <th>Deferimento</th>
			                    <th>Volta</th>
			                  </tr>
			                </thead>
			                <tbody>
							  <tr><!--informaçoes meramente demonstrativas -->
						       	<th>6</th>
						       	<td>Jose cicero ferreira</td>
						       	<td>escola jaoao correia</td>
							    <td>2220897</td>
							    <td>000026</td>
							    <td>licença medica</td>
							    <td>13/04/2006</td>
							    <td>12/03/2010</td>
							    <td>30/05/2020</td>
							  </tr>
			                </tbody>
			              </table>
			            </div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>