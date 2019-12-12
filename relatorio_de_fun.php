<?php
    session_start();
    include 'verifica_usuario_logado.php';
    include_once 'conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Relatório de Funcionário</title>
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
                        <a class="nav-link" href="relatorio_de_fun.php">Relatório de Funcionário<span class="sr-only">(página atual)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center"><!--Grid -->
                <div class="col-12 justify-content-center align-items-center">
                    <!--class "cabeca_relatorio_de_fun" editar estilo do cabeçalho da coluna  -->
                    <div class="cabeca_relatorio_de_fun">
                        <button class="btn btn-secondary"><img src="img/report.png" style="padding-right: 20px"><span>Relatório de Funcionário</span></button>
                    </div>
                    <!--Corpo da coluna onde fica os inputs -->
                    <div class="area_de_relatorio_fun">
                        <div>
                            <form method="POST">
                                <!-- class formulario_alinhamento para alinhar a div no centro -->
                                <div class="input-group formulario_alinhamento_fun">
                                    <div>
                                        <!-- class InputMatricula para dar um estilo a mais para o input -->
                                        <input class="InputMatricula_fun" type="text" name="busca" placeholder="Busca por Matricula">
                                        <button type="submit" class="btn btn-light tamanho_botao"><img src="img/search.png"></button><!--class tamanho_botao para dar estilo ao botao-->
                                    </div>
                                    <div style="margin-left: 50px"><!--botao de imprimir -->
                                        <button type="submit" class="btn btn-secondary">Imprimir</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive"><!--tabela de relatorio -->
                            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <!-- -->
                                <thead class="thead-light">
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nome</th>
                                    <th>Local de Trabalho</th>
                                    <th>Cargo</th>
                                    <th>RG</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                </tr>
                                </thead>
                                  <?php
                                  //* Verificando se o campo busca não está mandando nenhum valor
                                  if($_POST['busca'] == ""){//O navegador inicia a página com excessão nessa linha, mas não sei porquê.
                                      $sql = "SELECT `fun_matricula`, `fun_nome`, `fun_celular`, `fun_rg`, `fun_cpf`, `fun_cargo`, `fun_local_trabalho` FROM `funcionario`";
                                  }
                                  else{
                                      $busca = ($_POST['busca']);
                                      $sql = "SELECT * FROM funcionario WHERE fun_matricula LIKE '$busca'";
                                  }
                                    $stmt = mysqli_query($conexao, $sql);
                                    while($row = mysqli_fetch_array($stmt)){?>
                                <tbody>
                                <tr><!--informaçoes meramente demonstrativas -->
                                    <th><?php echo $row['fun_matricula'];?></th>
                                    <td><?php echo $row['fun_nome'];?></td>
                                    <td><?php echo $row['fun_local_trabalho'];?></td>
                                    <td><?php echo $row['fun_cargo'];?></td>
                                    <td><?php echo $row['fun_rg'];?></td>
                                    <td><?php echo $row['fun_cpf'];?></td>
                                    <td><?php echo $row['fun_celular'];?></td>
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