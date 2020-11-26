<?php 
    session_start();
    include('dbconnect.php');

    if(isset($_POST['inicioTrecho']) && isset($_POST['inicioTrecho'])){
        $_SESSION['inicioTrecho'] = $_POST['inicioTrecho'];
        $_SESSION['finalTrecho'] = $_POST['finalTrecho'];
    }

    //consulta para métricas de desempenho do operador - num dispositivos por dia
    $data = date("d/m/Y");
    $consulta = "SELECT codAuto, data FROM drenagem_superficial WHERE edit = 1 AND data = '$data'";
    $retorno = mysqli_query($link, $consulta);
    $linhas = mysqli_num_rows($retorno);//dispositivos inspecionados
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
  <span class="navbar-brand mb-0 h1">Planilha Drenagem Superficial</span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="index.php">Home</a></li>
         <li class="breadcrumb-item"><a href="trecho.php">Definir trecho - Planilha Drenagem Superficial</a></li>
        <li class="breadcrumb-item active" aria-current="page">Planilha Drenagem Superficial</li>
    </ol>
    </nav>
        <div id="container-tabela">
        <div class="alert alert-primary col-sm-2" id="msg-desempenho" role="alert">
         <?php echo "Acumulado do dia: ".$linhas; ?>
    </div>
            <table class="table table-responsive hover" id="tabela_ds">
                <thead class="thead-dark">
                    <tr>
                        <th>Editado</th>
                   
                        <th>Identificação</th>
                        <th>Km inicial</th>
                        <th>Km final</th>
                        <th>Início Coordenada X</th>
                        <th>Início Coordenada Y</th>
                        <th>Fim Coordenada X</th>
                        <th>Fim Coordenada Y</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($_POST['inicioTrecho']=="" && $_POST['finalTrecho']){
                            $sql = "SELECT * FROM drenagem_superficial";
                        }else {
                            $sql = "SELECT * FROM drenagem_superficial WHERE km LIKE '".$_SESSION['inicioTrecho']."%' OR km LIKE '".$_SESSION['finalTrecho']."%'";

                        }
                        $resultado = mysqli_query($link, $sql);
                    
                        if(mysqli_num_rows($resultado) > 0):
                            
                            while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td><?php echo ($dados['edit']==1) ? 'OK <span class="glyphicon glyphicon-ok text-success"></span>': ''; ?></td>
                        <td><?php echo $dados['identificacao2020_2']; ?></td>
                        <td><?php echo $dados['km']; ?></td>
                        <td><?php echo $dados['kmFinal']; ?></td>
                        <td><?php echo $dados['latitude1']; ?></td>
                        <td><?php echo $dados['longitude1']; ?></td>
                        <td><?php echo $dados['latitude2']; ?></td>
                        <td><?php echo $dados['longitude2']; ?></td>
                        <td><a href="view_editar_ds.php?id=<?php echo $dados['codAuto']; ?>" class="btn btn-secondary ">Editar</a></td>
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