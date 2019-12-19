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
        <script src="https://kit.fontawesome.com/68d49f23cf.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Relatório de Funcionário</title>
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
                        <a class="nav-link" href="relatorio_de_fun.php">Relatório de Funcionário<span class="sr-only">(página atual)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="margin-top: 10px"><!--Grid -->
                <div class="col-12 justify-content-center align-items-center">
                    <!--Corpo da coluna onde fica os inputs -->
                    <div class="area_de_relatorio_fun"><br>
                        <div class="table-responsive"><!--tabela de relatorio -->
                            <div>
                                <a class="btn btn-success" href="cadastro_de_fun.php" style="float: left; margin-right: 10px"><i class="fas fa-plus"></i> Adicionar</a>
                                <button type="submit" class="btn btn-dark" style="float: left; margin-right: 10px">Imprimir</button>
                                <form method="POST" style="float: left">
                                    <input class="InputMatricula_fun" type="text" name="busca" placeholder="Buscar por Matricula" style="margin-right: 5px">
                                    <button type="submit" class="btn btn-dark" style="height: 35px; padding-top: 5px; margin-right: 10px"><i class="fas fa-search"></i></button>
                                </form>
                            </div></br></br>
                            <?php
                                if(isset($_SESSION['msg'])){
                                    $msg = $_SESSION['msg'];

                                    if($msg == "Funcionário excluído com sucesso."){
                                        echo "<div class='alert alert-info' role='alert'>$msg</div>";
                                    }
                                    else if($msg == "Funcionário alterado com sucesso."){
                                        echo "<div class='alert alert-info' role='alert'>$msg</div>";
                                    }
                                    else if($msg == "Funcionário cadastrado com sucesso"){
                                        echo "<div class='alert alert-info' role='alert'>$msg</div>";
                                    }
                                    else{
                                        echo "<div class='alert alert-danger' role='alert'>$msg</div>";
                                    }
                                    unset($_SESSION['msg']);
                                }
                            ?><br>
                            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <!-- -->
                                <thead class="thead-dark">
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nome</th>
                                    <th>Local de Trabalho</th>
                                    <th>Cargo</th>
                                    <th>RG</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>
                                        Operações
                                    </th>
                                </tr>
                                </thead>
                                  <?php
                                  //* Verificando se o campo busca não está mandando nenhum valor
                                  if(empty($_POST['busca'])){//Verificando se busca está vazio.
                                      $sql = "SELECT * FROM funcionario";
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
                                    <td>
                                        <div class="row justify-content-center align-items-center">
                                            <a class="btn btn-info" style="float: left; margin-right: 15px" href="editar_form_fun.php?matricula=<?php echo $row['fun_matricula'];?>">
                                                <i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger" style="float: left; margin-right: 15px" href="excluir_fun.php?matricula=<?php echo $row['fun_matricula'];?>">
                                                <i class="fas fa-trash"></i></a>
                                            <button class="btn btn-outline-secondary view_data" id="<?php echo $row['fun_matricula'];?>" style="float: left"><i class="fas fa-list"></i></button>
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
        <!-- Modal -->
        <div class="modal fade" id="visualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes do funcionário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="conteudoFun"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click','.view_data', function () {
                    var fun_id = $(this).attr("id");
                    //alert(fun_id);
                    //Verificar se há valor na variável fun_id.
                    if(fun_id !== ""){
                        var dados = {
                            fun_id: fun_id
                        };
                        //Modal php
                        $.post('visualizar_fun.php', dados, function (retorna) {
                            //Carregar conteúdo para o usuário
                            $('#conteudoFun').html(retorna);
                            $('#visualizarModal').modal('show');
                        });
                    }
                });
            });
        </script>
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>