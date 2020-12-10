<?php 
    session_start();
    include('dbconnect.php');

    if(isset($_POST['inicioTrecho']) && isset($_POST['inicioTrecho'])){
        $_SESSION['inicioTrecho'] = $_POST['inicioTrecho'];
        $_SESSION['finalTrecho'] = $_POST['finalTrecho'];
    }

    /*Torna a ordem de inicio do trecho irrelevante */
    if ($_SESSION['inicioTrecho']>$_SESSION['finalTrecho']){
        $aux = $_SESSION['finalTrecho'];
        $_SESSION['finalTrecho'] = $_SESSION['inicioTrecho'];
        $_SESSION['inicioTrecho'] = $aux;
    }

    //consulta para métricas de desempenho do operador - num dispositivos por dia
    $data = date("d/m/Y");
    $consulta = "SELECT codAuto, data FROM drenagem_profunda WHERE edit = 1 AND editM =1 AND editJ = 1 AND data = '$data'";
    $retorno = mysqli_query($link, $consulta);
    $linhas = mysqli_num_rows($retorno);//fichas completas

    $consulta2 = "SELECT codAuto, data FROM drenagem_profunda WHERE edit = 1 AND data = '$data' AND (editM =0 OR editJ = 0)";
    $retorno2 = mysqli_query($link, $consulta2);
    $linhas2 = mysqli_num_rows($retorno2);//fichas incompletas
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="DataTables-1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="DataTables-1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css">        
        
        <title></title>
    </head>
    <body>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1">Planilha Drenagem Profunda</span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="index.php">Home</a></li>
         <li class="breadcrumb-item"><a href="trecho_dp.php">Definir trecho - Planilha Drenagem Profunda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Planilha Drenagem Profunda</li>
    </ol>
    </nav>
        <div id="container-tabela">
        <div class="alert alert-primary col-sm-2" id="msg-desempenho" role="alert">
         <?php echo "Acumulado do dia: ".$linhas; ?>
        </div>
        <div class="col-sm-1"></div>

        <div class="alert alert-warning col-sm-2" id="msg-desempenho" role="alert">
         <?php echo "Fichas em aberto: ".$linhas2; ?>
        </div>
            <table class="table table-responsive hover" id="tabela_ds">
                <thead class="thead-dark">
                    <tr>
                        <th>Editado</th>
                        <th>Identificação</th>
                        <th>Km inicial</th>
                        <th>Km final</th>
                        <th>Latitude Montante</th>
                        <th>Longitude Montante</th>
                        <th>Latitude Jusante</th>
                        <th>Longitude Jusante</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($_SESSION['inicioTrecho']=="" && $_SESSION['finalTrecho']==""){
                            $sql = "SELECT identificacao, kmInicial, kmFinal, latitudeM, longitudeM, latitudeJ, longitudeJ, edit, editM, editJ FROM drenagem_profunda";
                        }else if($_SESSION['inicioTrecho']=="" || $_SESSION['finalTrecho']==""){
                            $sql = "SELECT identificacao, kmInicial, kmFinal, latitudeM, longitudeM, latitudeJ, longitudeJ, edit, editM, editJ FROM drenagem_profunda WHERE kmInicial LIKE '".$_SESSION['inicioTrecho']."%' OR kmFinal LIKE '".$_SESSION['finalTrecho']."%'";

                        }else {
                            $sql = "SELECT identificacao, kmInicial, kmFinal, latitudeM, longitudeM, latitudeJ, longitudeJ, edit, editM, editJ FROM drenagem_profunda WHERE CAST(kmInicial AS decimal(10,2)) >=".$_SESSION['inicioTrecho']." AND CAST(kmFinal AS decimal(10,2)) <=".$_SESSION['finalTrecho'];
                        }
                        $resultado = mysqli_query($link, $sql);
                    
                        if(mysqli_num_rows($resultado) > 0):
                            
                            while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <?php
                            if ($dados['edit']==1 && $dados['editJ']==1 && $dados['editM']==1){
                                $ok = '<span><img src="img/ok.png" width="20px"/></span>';
                            }else if ($dados['edit']==0){
                                $ok = '';
                            }else {
                                $ok = '<span><img src="img/exc.png" width="20px"/></span>';
                            }
                        ?>
                        <td><?php echo $ok; ?></td>
                        <td><?php echo $dados['identificacao']; ?></td>
                        <td><?php echo $dados['kmInicial']; ?></td>
                        <td><?php echo $dados['kmFinal']; ?></td>
                        <td><?php echo $dados['latitudeM']; ?></td>
                        <td><?php echo $dados['longitudeM']; ?></td>
                        <td><?php echo $dados['latitudeJ']; ?></td>
                        <td><?php echo $dados['longitudeJ']; ?></td>
                        <td><a href="view_editar_dp.php?id=<?php echo $dados['codAuto']; ?>" class="btn btn-secondary ">Editar</a></td>
                    </tr>
                <?php 
                    endwhile;
                    endif;
                    mysqli_close($link);
                ?>
                </tbody>
            </table>
        
        </div>
  <script src="jQuery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap-3.3.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="DataTables-1.10.22/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#tabela_ds').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "search": "Pesquisar"
            }
        });
  });
  </script>
    </body>
</html>