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
  <span class="navbar-brand mb-0 h1">Definir trecho - Exportar Planilha Drenagem Profunda</span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Definir trecho - Exportar Planilha Drenagem Profunda</li>
    </ol>
    </nav>
        <div id="container-tabela">
            <form action="exportar_planilha_dp.php" method="post"> 
                <fieldset>
                    <div class="form-group row">
                    <h4 style="padding-left: 20px;">Por favor, insira o km inicial e o km final que deseja inspecionar:</h4>
                    </div>
                    <div class="form-group row">
                    <h6 style="padding-left: 20px;">(Caso deseje visualizar a planilha completa, deixe os campos em branco)</h6>
                    </div>
                     <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                            <span class="input-group-addon">Início do trecho</span>
                            <input id="inicioTrecho" name="inicioTrecho" class="form-control" type="text" placeholder="ex: 270">
                            </div>
                           
                        </div>           
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                            <span class="input-group-addon">Final do trecho</span>
                            <input id="finalTrecho" name="finalTrecho" class="form-control" type="text" placeholder="ex: 320">
                            </div>
                            <br>
                        </div>           
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="Cadastrar"></label>
                        <div class="col-sm-8">
                            <button id="cadastrar" name="cadastrar" class="btn btn-success" type="submit">Exportar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
   <script src="js/app.js"></script>
  <script src="jQuery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap-3.3.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
    </body>
</html>