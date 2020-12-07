<?php
    session_start();
    include('dbconnect.php');

    if(isset($_GET['id'])):
        $id = mysqli_escape_string($link, $_GET['id']);
    
        $sql = "SELECT * FROM drenagem_profunda WHERE codAuto = '$id'";
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
                 <span class="navbar-text navbar-brand mb-0 h1">Editar Ficha Drenagem Profunda</span>
                
                </nav>
            </div>
        <div>
        <div class="row">
            <div class="col-sm-12" id="nav-div">
                <nav aria-label="breadcrumb bg-white">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="trecho_dp.php">Definir trecho - Planilha Drenagem Profunda</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="index_dp.php">Planilha Drenagem Profunda</a></li>
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
            <div class="col-sm-4 control-label">      
            <?php
                    if(isset($_SESSION['editado']) && $_SESSION['editado']):
            ?>
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok">&nbsp; </span> Ficha Editada!
            </div>
            <?php
                    endif;
            ?>
            <?php
                    if(isset($_SESSION['editado']) && $_SESSION['editado']==false):
            ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-remove"> &nbsp;</span> Erro na edição!
            </div>
            <?php
                    endif;
                    unset($_SESSION['editado']);
            ?>
            </div>
        </div>
        <form  action="editar_dp.php" method="post" enctype="multipart/form-data" class="form-horizontal">
           <fieldset>         
            <input type="hidden" name="codAuto" value="<?php echo $dados['codAuto'];?>">
            <input type="hidden" name="foto1Mdir" value="<?php echo $dados['foto1M'];?>">
            <input type="hidden" name="foto2Mdir" value="<?php echo $dados['foto2M'];?>">
            <input type="hidden" name="foto1Mdir" value="<?php echo $dados['foto1J'];?>">
            <input type="hidden" name="foto2Mdir" value="<?php echo $dados['foto2J'];?>">
            
            <div class="form-group row">
            <div class="col-md-11 control-label">
                    <p class="help-block"><h11>*</h11> Campo Obrigatório </p><br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="identificacao">Identificação</label>  
                <div class="col-sm-4">
                <input id="identificacao" name="identificacao"  class="form-control input-sm" required="" type="text" value="<?php echo $dados['identificacao'];?>" readonly><br>
                </div>
                <label class="col-sm-2 control-label" for="data">Data Inspeção</label>  
                <div class="col-sm-2">
                    <input id="data" name="data" placeholder="" class="form-control input-sm" required="required" readonly type="text" value="<?php echo $dados['data'];?>"><br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 control-label" for="prependedtext">Medidas</label>
                <div class="col-md-3">
                    <div class="input-group">
                    <span class="input-group-addon">Extensão</span>
                    <input id="extensao" name="extensao" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['extensao'];?>">
                    </div><br>    
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">Dimensão Montante</span>
                        <input id="dimensoesM" name="dimensoesM" class="form-control" required=""  type="text" readonly value="<?php echo $dados['dimensoesM'];?>">
                    </div><br>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                    <span class="input-group-addon">Dimensão Jusante</span>
                    <input id="dimensoesJ" name="dimensoesJ" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['dimensoesJ'];?>">
                    </div> <br>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="km">Km</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Km Inicial</span>
                        <input id="kmInicial" name="kmInicial" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['kmInicial'];?>">
                    </div><br>
                </div>

                <div class="col-sm-5">
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
                        <span class="input-group-addon">Lat. Montante</span>
                        <input id="latitudeM" name="latitudeM" class="form-control" required="" readonly="readonly" type="text" value="<?php echo $dados['latitudeM'];?>">
                    </div><br>
                </div>

                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Lon. Montante</span>
                        <input id="longitudeM" name="longitudeM" class="form-control" required=""  type="text" readonly value="<?php echo $dados['longitudeM'];?>">
                    </div><br>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="coordenadas"></label>
                <div class="col-sm-5">
                    <div class="input-group">
                         <span class="input-group-addon">Lat. Jusante</span>
                         <input id="latitudeJ" name="latitudeJ" class="form-control" required=""  readonly="readonly" type="text" value="<?php echo $dados['latitudeJ'];?>">
                    </div> <br>
                </div>
                
                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Lon. Jusante</span>
                        <input id="longitudeJ" name="longitudeJ" class="form-control" required=""  readonly="readonly" type="text" value="<?php echo $dados['longitudeJ'];?>">
                    </div><br>
                    
                </div>
            </div>          
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="tipo">Tipo</label>  
                <div class="col-sm-2">
                    <input id="tipoBueiro" name="tipoBueiro" class="form-control input-sm" required="" type="text" readonly  value="<?php echo $dados['tipoBueiro'];?>">
                </div>
                <label class="col-sm-2 control-label" for="forma">Forma</label>  
                <div class="col-sm-2">
                    <input id="forma" name="forma" placeholder="" class="form-control input-md" required="" type="text" readonly  value="<?php echo $dados['forma'];?>"><br><br>
                </div>
            </div>
            <hr>
         
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext">Diagnóstico Montante</label>
                <div class="col-sm-2" >                     
                    <input type="checkbox" autocomplete="off" name="assoreadoM" id="assoreadoM" value="on" <?php  echo ($dados['assoreadoM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('assoreadoM', 'montante');">
                    </label>
                    <label for="assoreadoM">Assoreado</label>  
                </div>

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="afogadoM" id="afogadoM" value="on" <?php  echo ($dados['afogadoM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('afogadoM', 'montante');">
                    </label>
                    <label for="afogadoM">Afogado</label> 
                </div> 

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="limpezaM" id="limpezaM" value="on" <?php  echo ($dados['limpezaM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('limpezaM','montante');">
                    </label>
                    <label for="limpezaM">Limpeza</label>  
                </div>    

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="okM" id="okM" value="on" <?php  echo ($dados['okM'] == "Sim") ? 'checked' : null;?> onclick="okClicadoDP('okM')">
                    </label>
                    <label for="okM">OK</label> 
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>
                <div class="col-sm-2" >                     
                    <input type="checkbox" autocomplete="off" name="testaAlaDanificadaM" id="testaAlaDanificadaM" value="on" <?php  echo ($dados['testaAlaDanificadaM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('testaAlaDanificadaM','montante');">
                    </label>
                    <label for="assoreadoM">Testa/ala Danificada</label>  
                </div>

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="caixaDanificadaM" id="caixaDanificadaM" value="on" <?php  echo ($dados['caixaDanificadaM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('caixaDanificadaM','montante');">
                    </label>
                    <label for="caixaDanificadaM">Caixa Danificada</label>  
                </div>    

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="erosaoM" id="erosaoM" value="on" <?php  echo ($dados['erosaoM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('erosaoM','montante');">
                    </label>
                    <label for="erosaoM">Erosão</label>  
                </div>  

                <div class="col-sm-3">
                    <input type="checkbox" autocomplete="off" name="tubulacaoDanificadaM" id="tubulacaoDanificadaM" value="on" <?php  echo ($dados['tubulacaoDanificadaM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('tubulacaoDanificadaM','montante');">
                    </label>
                    <label for="tubulacaoDanificadaM">Tubulação Danificada</label> 
                </div> 
                
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>    
                <div class="col-sm-2">
                        <input type="checkbox" autocomplete="off" name="fissuraTrincaM" id="fissuraTrincaM" value="on" <?php  echo ($dados['fissuraTrincaM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('fissuraTrincaM','montante');">
                        </label>
                        <label for="fissuraTrincaM">Fissura/Trinca</label>  
                    </div>  

                    <div class="col-sm-4">
                        <input type="checkbox" autocomplete="off" name="tampaDanificadaInexM" id="tampaDanificadaInexM" value="on" <?php  echo ($dados['tampaDanificadaInexM'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('tampaDanificadaInexM','montante');">
                        </label>
                        <label for="tampaDanificadaInexM">Tampa Danificada/Inexist.</label>  
                    </div>  
            </div>
            
            <br>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto1M">Foto 1 Montante</label>  
                <div class="col-sm-2">
                      <input id="foto1M" name="foto1M" type="file" accept="image/*" >  
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto2M">Foto 2 Montante</label>  
                <div class="col-sm-2">
                     <input id="foto2M" name="foto2M" type="file" accept="image/*" >  
                </div>
            </div>
            <?php 
                if($dados['foto1M']!=null && $dados['foto2M']!=null):
            ?>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto1M">Foto Montante Adicionadas</label>  
                <div class="col-sm-2">
                <img src="<?php echo $dados['foto1M'];?>" alt="Minha Figura" width="100%">	        
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                <img src="<?php echo $dados['foto2M'];?>" alt="Minha Figura" width="100%">	     
                </div>
            </div>
            <?php
                 endif;
            ?>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="observacaoMontante">Observação estado de conservação montante</label>  
                <div class="col-sm-8">
                     <textarea class="form-control" name="observacaoMontante" id="observacaoMontante" rows="3" maxlength="150" value="<?php echo $dados['observacaoMontante'];?>"></textarea>   
                </div>
            </div>
            <hr>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext">Diagnóstico Jusante</label>
                <div class="col-sm-2" >                     
                    <input type="checkbox" autocomplete="off" name="assoreadoJ" id="assoreadoJ" value="on" <?php  echo ($dados['assoreadoJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('assoreadoJ','jusante');">
                    </label>
                    <label for="assoreadoJ">Assoreado</label>  
                </div>

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="afogadoJ" id="afogadoJ" value="on" <?php  echo ($dados['afogadoJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('afogadoJ','jusante');">
                    </label>
                    <label for="afogadoJ">Afogado</label> 
                </div> 

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="limpezaJ" id="limpezaJ" value="on" <?php  echo ($dados['limpezaJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('limpezaJ','jusante');">
                    </label>
                    <label for="limpezaJ">Limpeza</label>  
                </div>    

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="okJ" id="okJ" value="on" <?php  echo ($dados['okJ'] == "Sim") ? 'checked' : null;?> onclick="okClicadoDP('okJ')">
                    </label>
                    <label for="okJ">OK</label> 
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>
                <div class="col-sm-2" >                     
                    <input type="checkbox" autocomplete="off" name="testaAlaDanificadaJ" id="testaAlaDanificadaJ" value="on" <?php  echo ($dados['testaAlaDanificadaJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('testaAlaDanificadaJ','jusante');">
                    </label>
                    <label for="assoreadoJ">Testa/ala Danificada</label>  
                </div>

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="caixaDanificadaJ" id="caixaDanificadaJ" value="on" <?php  echo ($dados['caixaDanificadaJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('caixaDanificadaJ','jusante');">
                    </label>
                    <label for="caixaDanificadaJ">Caixa Danificada</label>  
                </div>    

                <div class="col-sm-2">
                    <input type="checkbox" autocomplete="off" name="erosaoJ" id="erosaoJ" value="on" <?php  echo ($dados['erosaoJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('erosaoJ','jusante');">
                    </label>
                    <label for="erosaoJ">Erosão</label>  
                </div>  

                <div class="col-sm-3">
                    <input type="checkbox" autocomplete="off" name="tubulacaoDanificadaJ" id="tubulacaoDanificadaJ" value="on" <?php  echo ($dados['tubulacaoDanificadaJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('tubulacaoDanificadaJ','jusante');">
                    </label>
                    <label for="tubulacaoDanificadaJ">Tubulação Danificada</label> 
                </div> 
                
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="prependedtext"></label>    
                <div class="col-sm-2">
                        <input type="checkbox" autocomplete="off" name="fissuraTrincaJ" id="fissuraTrincaJ" value="on" <?php  echo ($dados['fissuraTrincaJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('fissuraTrincaJ','jusante');">
                        </label>
                        <label for="fissuraTrincaJ">Fissura/Trinca</label>  
                    </div>  

                    <div class="col-sm-4">
                        <input type="checkbox" autocomplete="off" name="tampaDanificadaInexJ" id="tampaDanificadaInexJ" value="on" <?php  echo ($dados['tampaDanificadaInexJ'] == "Sim") ? 'checked' : null;?> onclick="clicadoDP('tampaDanificadaInexJ','jusante');">
                        </label>
                        <label for="tampaDanificadaInexJ">Tampa Danificada/Inexist.</label>  
                    </div>  
            </div>

            <br>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto1J">Foto 1 Jusante</label>  
                <div class="col-sm-2">
                      <input id="foto1J" name="foto1J" type="file" accept="image/*" >  
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label" for="foto2J">Foto 2 Jusante</label>  
                <div class="col-sm-2">
                     <input id="foto2J" name="foto2J" type="file" accept="image/*" >  
                </div>
            </div>
            <?php 
                if($dados['foto1J']!=null && $dados['foto2J']!=null):
            ?>
            <div class="form-group row">
                <label class="col-sm-2 control-label" for="fotoJ">Foto Jusante Adicionadas</label>  
                <div class="col-sm-2">
                <img src="<?php echo $dados['foto1J'];?>" alt="Minha Figura" width="100%">	        
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                <img src="<?php echo $dados['foto2J'];?>" alt="Minha Figura" width="100%">	     
                </div>
            </div>
            <?php
                 endif;
            ?>


            <div class="form-group row">
                <label class="col-sm-2 control-label" for="observacaoJusante">Observação estado de conservação jusante</label>  
                <div class="col-sm-8">
                     <textarea class="form-control" name="observacaoJusante" id="observacaoJusante" rows="3" maxlength="150" ><?php echo $dados['observacaoJusante'];?></textarea>   
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

