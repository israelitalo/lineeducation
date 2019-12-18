<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include "conexao.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://kit.fontawesome.com/68d49f23cf.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Relatório de Requerimento</title>
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
						<a class="nav-link" href="">Relatório de Requerimento<span class="sr-only">(página atual)</span></a>
					</li>
				</ul>
			</div>
		</nav>
        <?php
        if(isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];

            if($msg == "Requerimento excluído com sucesso."){
                echo "<div class='alert alert-info' role='alert'>$msg</div>";
            }
            else if($msg == "Requerimento alterado com sucesso."){
                echo "<div class='alert alert-info' role='alert'>$msg</div>";
            }
            else if($msg == "Requerimento cadastrado com sucesso"){
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
				<div class="col-sm-12 justify-content-center align-items-center">
					<!--Corpo da coluna onde fica os relatorio -->
					<div class="area_de_relatorio_req"><br>
						<div class="table-responsive"><!--tabela de relatorio -->
                            <div class="col-12 row justify-content-end">
                                <a class="btn btn-success" href="cadastro_de_req.php" style="float: left; margin-right: 10px"><i class="fas fa-plus"></i> Adicionar</a>
                                <button type="submit" class="btn btn-dark" style="float: left; margin-right: 10px">Imprimir</button>
                            </div>
                            <div class="col-4">
                                <form method="POST" style="float: left">
                                    <input type="checkbox" id="check" name="checkbox_matricula" style="cursor: pointer" value="ativo">
                                    <label for="checkbox_matricula">Matrícula</label>
                                    <input type="checkbox" id="check_req_id" name="checkbox_req_id" style="cursor: pointer; margin-left: 5px" value="ativo">
                                    <label for="checkbox_matricula">Requerimento</label><br>
                                    <input class="InputMatricula_fun" type="text" name="busca" placeholder="Buscar por Matrícula" style="margin-right: 5px">
                                    <button type="submit" class="btn btn-dark" style="height: 35px; padding-top: 5px; margin-right: 10px"><i class="fas fa-search"></i></button>
                                </form><br>
                            </div></br></br><br>
			              <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
			                <thead class="thead-dark">
			                  <tr>
                                <th>Código</th>
                                <th>Matrícula</th>
			                  	<th>Funcionário</th>
                                <th>Requerimento</th>
                                <th>Local de Trabalho</th>
			                    <th>Solicitação</th>
			                    <th>Deferimento</th>
			                    <th>Volta</th>
                                <th>Operações</th>
			                  </tr>
			                </thead>
                              <?php
                              if(isset($_POST['busca']) && isset($_POST['checkbox_req_id']) && isset($_POST['checkbox_matricula'])){
                                  $_SESSION['msg'] = "Selecione apenas um filtro de busca: matrícula ou requerimento.";
                                  header("Location: relatorio_de_req.php");
                              }
                              else if(empty($_POST['busca']) && empty($_POST['checkbox_matricula']) || empty($_POST['busca']) && empty($_POST['checkbox_req_id'])){
                                  $sql = "SELECT * FROM requerimento";
                              }
                              else if(isset($_POST['busca']) && isset($_POST['checkbox_matricula'])){
                                  $matricula = $_POST['busca'];
                                  $sql = "SELECT * FROM requerimento WHERE req_fun_matricula = '$matricula'";
                              }
                              else if(isset($_POST['busca']) && isset($_POST['checkbox_req_id'])){
                                  $req_id = $_POST['busca'];
                                  $sql = "SELECT * FROM requerimento WHERE req_id = '$req_id'";
                              }
                              else if(isset($_POST['busca']) && empty($_POST['checkbox_matricula'])){
                                  $_SESSION['msg'] = "Para pesquisar por matrícula, selecione a opção matrícula.";
                                  header("Location: relatorio_de_req.php");
                              }
                              else if(isset($_POST['busca']) && empty($_POST['checkbox_req_id'])){
                                  $_SESSION['msg'] = "Para pesquisar por nº de requerimento, selecione a opção requerimento.";
                                  header("Location: relatorio_de_req.php");
                              }
                              $stmt = mysqli_query($conexao, $sql);
                              while ($row = mysqli_fetch_array($stmt)){?>
			                <tbody>
                            <tr>
                                <td><?php echo $row['req_id'];?></td>
                                <th><?php echo  $row['req_fun_matricula'];?></th>
                                <?php
                                    $sqlNome = "SELECT * FROM funcionario f, requerimento r WHERE r.req_fun_matricula
                                    ='".$row['req_fun_matricula']."' AND f.fun_matricula = '".$row['req_fun_matricula']."'";
                                    $stmtNome = mysqli_query($conexao, $sqlNome);
                                    $rowNome = mysqli_fetch_array($stmtNome);
                                ?>
                                <td><?php echo $rowNome['fun_nome'];?></td>
                                <td><?php echo $row['req_tipo_req'];?></td>
                                <td><?php echo $rowNome['fun_local_trabalho'];?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['req_entrada']));?></td>
                                <td><?php echo date('d/m/Y', strtotime($rowNome['req_deferimento']));?></td>
                                <td><?php echo date('d/m/Y', strtotime($rowNome['req_volta']));?></td>
                                <td>
                                    <div class="row justify-content-center align-items-center">
                                        <a class="btn btn-info" style="float: left; margin-right: 15px" href="editar_form_req.php?id=<?php echo $row['req_fun_matricula'];?>">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" style="float: left; margin-right: 15px" href="excluir_req.php?id=<?php echo $row['req_fun_matricula'];?>">
                                            <i class="fas fa-trash"></i></a>
                                        <button class="btn btn-outline-secondary view_data" id="<?php echo $row['req_fun_matricula'];?>" style="float: left"><i class="fas fa-list"></i></button>
                                    </div>
                                </td>
                            </tr>
			                </tbody>
                              <?php }?>
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