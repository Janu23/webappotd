<?php
    session_start();
    include('dbconnect.php');

    if(isset($_GET['id'])):
        $id = mysqli_escape_string($link, $_GET['id']);
    
        $sql = "SELECT * FROM drenagem_superficial WHERE codAuto = '$id'";
        $resultado = mysqli_query($link, $sql);
        $dados = mysqli_fetch_array($resultado);
    endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css">
       
        <title></title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-dark bg-dark">
                 <span class="navbar-text navbar-brand mb-0 h1">Editar Ficha Drenagem Superficial</span>
                
                </nav>
            </div>
        <div>
        <div class="row">
            <div class="col-sm-12" id="nav-div">
                <nav aria-label="breadcrumb bg-white">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="trecho.php">Definir trecho - Planilha Drenagem Superficial</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="index_ds.php">Planilha Drenagem Superficial</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Ficha</li>
                </ol>
                </nav>
            </div>
        <div>
    </div>
    <div class="container" id="form-container">
    <div class="form-group row">
             <?php
                    if(isset($_SESSION['editado'])==null):
            ?>
            <div class="col-sm-4 control-label"></div>
            <?php
                    endif;
            ?>
       </div>
        <div class="form-group row">
            <div class="col-sm-3 control-label">      
            <?php
                    if(isset($_SESSION['editado']) && $_SESSION['editado']):
            ?>
            <div class="alert alert-success" role="alert">
            &nbsp; Ficha Editada! &nbsp; <span><img src="img/ok.png" width="20px"/></span>
            </div>
            <?php
                    endif;
            ?>
            <?php
                    if(isset($_SESSION['editado']) && $_SESSION['editado']==false):
            ?>
            <div class="alert alert-danger" role="alert">
            &nbsp; Erro na edição! &nbsp; <span><img src="img/error.png" width="20px"/></span>
            </div>
            <?php
                    endif;
                    unset($_SESSION['editado']);
            ?>
            </div>
        </div>
        <form  action="editar_ds.php" method="post" enctype="multipart/form-data" class="form-horizontal">
           <fieldset>         
            <input type="hidden" name="codAuto" value="<?php echo $dados['codAuto'];?>">
            <input type="hidden" name="foto1dir" value="<?php echo $dados['foto1_fichas_nova'];?>">
            <input type="hidden" name="foto2dir" value="<?php echo $dados['foto2_fichas_nova'];?>">
            
            <div class="form-group row">
            <div class="col-md-11 control-label">
                    <p class="help-block"><h11>*</h11> Campo Obrigatório </p><br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="identificacao">Identificação</label>  
                <div class="col-sm-6">
                <input id="identificacao" name="identificacao"  class="form-control input-sm" required="" type="text" value="<?php echo $dados['identificacao2020_2'];?>" readonly><br>
                </div>
                <label class="col-sm-2 control-label" for="data">Data Inspeção</label>  
                <div class="col-sm-2">
                    <input id="data" name="data" placeholder="" class="form-control input-sm" required="required" readonly type="text" value="<?php echo $dados['data'];?>"><br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext">Medidas</label>
                <div class="col-sm-3">
                    <div class="input-group">
                    <span class="input-group-addon">Extensão</span>
                    <input id="extensao" name="extensao" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['comprimento'];?>">
                    </div><br>    
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon">Largura</span>
                        <input id="largura" name="largura" class="form-control" required=""  type="text" readonly value="<?php echo $dados['larguraFicha'];?>">
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                    <span class="input-group-addon">Altura</span>
                    <input id="altura" name="altura" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['altura'];?>">
                    </div> <br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="km">Km</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Km Inicial</span>
                        <input id="kmInicial" name="kmInicial" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['km'];?>">
                    </div><br>
                </div>

                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Km Final</span>
                        <input id="kmFinal" name="kmFinal" class="form-control" required=""  type="text" readonly value="<?php echo $dados['kmFinal'];?>">
                    </div><br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="coordenadas">Coordenadas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Latitude Inicial</span>
                        <input id="latitude1" name="latitude1" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['latitude1'];?>">
                    </div><br>
                </div>

                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Longitude Inicial</span>
                        <input id="longitude1" name="longitude1" class="form-control" required=""  type="text" readonly value="<?php echo $dados['longitude1'];?>">
                    </div><br>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="coordenadas"></label>
                <div class="col-sm-5">
                    <div class="input-group">
                         <span class="input-group-addon">Latatitude Final</span>
                         <input id="latitude2" name="latitude2" class="form-control" required=""  readonly="readonly" type="text" value="<?php echo $dados['latitude2'];?>">
                    </div> <br>
                </div>
                
                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Longitude Final</span>
                        <input id="longitude2" name="longitude2" class="form-control" required=""  readonly="readonly" type="text" value="<?php echo $dados['longitude2'];?>">
                    </div><br>
                    
                </div>
            </div>          
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="tipo">Tipo</label>  
                <div class="col-sm-2">
                    <input id="tipo" name="tipo" class="form-control input-sm" required="" type="text" readonly  value="<?php echo $dados['sigla'];?>">
                </div>
                <label class="col-sm-2 control-label" for="material">Material</label>  
                <div class="col-sm-2">
                    <input id="material" name="material" placeholder="" class="form-control input-md" required="" type="text" readonly  value="<?php echo $dados['material'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="ambiente">Ambiente</label>  
                <div class="col-sm-2">
                    <input id="ambiente" name="ambiente" class="form-control input-sm" required="" type="text" readonly  value="<?php echo $dados['ambiente'];?>">
                </div>
                <label class="col-sm-2 control-label" for="estadoConservacao">Estado de Conservação</label>  
                <div class="col-sm-2">
                    <input id="estadoConservacao" name="estadoConservacao" class="form-control input-md" required="" type="text" readonly  value="<?php echo $dados['estadoConservacao'];?>"><br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext">Diagnóstico</label>
                <div class="col-sm-2" >                     
                    <input type="checkbox" autocomplete="off" name="reparar" id="reparar" value="on" <?php  echo ($dados['reparo'] == "Sim") ? 'checked' : null;?> onclick="changeExtensaoReparo('sim');clicado('sim','reparar');">
                    </label>
                    <label for="reparar">Reparar</label>  
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                    <span class="input-group-addon">Extensão Reparo(m)</span>
                    <input id="extensaoReparo" name="extensaoReparo" class="form-control" required="" type="number" max="<?php echo $dados['comprimento'];?>" step="0.01" value="<?php echo $dados['extensaoReparo'];?>" <?php echo ($dados['reparo'] == "Sim") ? null : 'disabled'; ?>>
                    </div>
                    
                </div>              
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>
                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="limpeza" id="limpeza" value="on" <?php  echo ($dados['limpeza'] == "Sim") ? 'checked' : null;?> onclick="changeExtensaoLimpeza('sim');clicado('sim','limpeza');">
                    </label>
                    <label for="limpeza">Limpeza</label>  
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                    <span class="input-group-addon">Extensão Limpeza(m)</span>
                    <input id="extensaoLimpeza" name="extensaoLimpeza" class="form-control" required="" type="number" max="<?php echo $dados['comprimento'];?>" step="0.01" value="<?php echo $dados['extensaoLimpeza'];?>" <?php echo ($dados['limpeza'] == "Sim") ? null : 'disabled'; ?>>
                    </div>
                    
                </div>           
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>
                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="implantar" id="implantar" value="on" <?php  echo ($dados['implantar'] == "Sim") ? 'checked' : null;?> onclick="changeExtensaoImplantar('sim');clicado('sim','implantar');">
                    </label>
                    <label for="implantar">Implantar</label> 
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                         <span class="input-group-addon">Extensão Implantar(m)</span>
                         <input id="extensaoImplantar" name="extensaoImplantar" class="form-control" required="" type="number" max="<?php echo $dados['comprimento'];?>" step="0.01" value="<?php echo $dados['extensaoImplantar'];?>" <?php echo ($dados['implantar'] == "Sim") ? null : 'disabled'; ?>>
                    </div>
                    
                </div>                          
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>
                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="ok" id="ok" value="on" <?php  echo ($dados['ok'] == "Sim") ? 'checked' : null;?> onclick="okClicado('sim')">
                    </label>
                    <label for="ok">OK</label> 
                </div>
            </div><br>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto1_ficha">Foto 1<h11>*</h11></label>  
                <div class="col-sm-2">
                      <input id="foto1_ficha" name="foto1_ficha" type="file" accept="image/*" required>  
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto2_ficha">Foto 2<h11>*</h11></label>  
                <div class="col-sm-2">
                     <input id="foto2_ficha" name="foto2_ficha" type="file" accept="image/*" required>  
                </div>
            </div>
            <?php 
                if($dados['foto1_fichas_nova']!=null && $dados['foto2_fichas_nova']!=null):
            ?>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto1_ficha">Foto Adicionadas</label>  
                <div class="col-sm-2">
                <img src="<?php echo $dados['foto1_fichas_nova'];?>" alt="Minha Figura" width="100%">	        
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                <img src="<?php echo $dados['foto2_fichas_nova'];?>" alt="Minha Figura" width="100%">	     
                </div>
            </div>
            <?php
                 endif;
            ?>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="observacao">Observação estado de conservação</label>  
                <div class="col-sm-8">
                     <textarea class="form-control" name="observacao" id="observacao" rows="3" maxlength="150" value="<?php echo $dados['observacao'];?>"></textarea>   
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="observacaoAlteracao">Observação alterações</label>  
                <div class="col-sm-8">
                     <textarea class="form-control" name="observacaoAlteracao" id="observacaoAlteracao" rows="3" maxlength="150" value="<?php echo $dados['observacaoAlteracao'];?>"></textarea>   
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="Cadastrar"></label>
                <div class="col-sm-8">
                    <button id="cadastrar" name="cadastrar" class="btn btn-success" type="submit">Salvar</button>
                    <button id="cancelar" name="cancelar" class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
            </fieldset>
        </form>
    </div>
        <script src="js/app.js"></script>
        <script src="jQuery-3.3.1/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

