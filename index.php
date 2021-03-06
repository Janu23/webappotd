<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <link href="css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title></title>
    </head>
    <body>
  <div class="container">
   <!-- As a heading -->
    <nav class="navbar bg-dark navbar-dark">
    <span class="navbar-brand mb-0 h1">Sistema Simplificado de Monitoração</span>
    </nav>
    <div class="form-group">
        <div class="col-sm-4">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Planilha Drenagem Superficial</div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Permite que o usuário visualize a planilha de drenagem superficial completa e edite as fichas contidas nela.</p>
                <a href="trecho.php" class="btn btn-light btn-block">Acessar</a>
            </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Exportar Planilha Drenagem Superficial</div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Permite que o usuário exporte a planilha de drenagem superficial em formato xls contendo fichas editadas e não editadas definindo os trechos como critério de filtragem.</p>
                <a href="trecho_exp_planilha.php" class="btn btn-light btn-block">Exportar</a>
            </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Exportar Planilha Drenagem Superfical Editada</div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Permite que o usuário exporte a planilha de drenagem superficial em formato xls contendo apenas fichas editadas.</p>
                <a href="exportar_planilha_ds_edit.php" class="btn btn-light btn-block">Exportar</a>
            </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/app.js"></script>
    <script src="jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
    </body>
</html>