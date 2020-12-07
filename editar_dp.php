<?php 
    session_start();
    include('dbconnect.php');

    $codAuto = $_POST['codAuto'];
    $data = date("d/m/Y");

    //checkbox diagnóstico montante
    $assoreadoM = (isset($_POST['assoreadoM'])) ? "Sim" : "Não";
    $afogadoM = (isset($_POST['afogadoM'])) ? "Sim" : "Não";
    $limpezaM = (isset($_POST['limpezaM'])) ? "Sim" : "Não";
    $testaAlaDanificadaM = (isset($_POST['testaAlaDanificadaM'])) ? "Sim" : "Não";
    $caixaDanificadaM = (isset($_POST['caixaDanificadaM'])) ? "Sim" : "Não";
    $erosaoM = (isset($_POST['erosaoM'])) ? "Sim" : "Não";
    $tubulacaoDanificadaM = (isset($_POST['tubulacaoDanificadaM'])) ? "Sim" : "Não";
    $fissuraTrincaM = (isset($_POST['fissuraTrincaM'])) ? "Sim" : "Não";
    $tampaDanificadaInexM = (isset($_POST['tampaDanificadaInexM'])) ? "Sim" : "Não";
    $okM = (isset($_POST['okM'])) ? "Sim" : "Não";

    //checkbox diagnóstico jusante
    $assoreadoJ = (isset($_POST['assoreadoJ'])) ? "Sim" : "Não";
    $afogadoJ = (isset($_POST['afogadoJ'])) ? "Sim" : "Não";
    $limpezaJ = (isset($_POST['limpezaJ'])) ? "Sim" : "Não";
    $testaAlaDanificadaJ = (isset($_POST['testaAlaDanificadaJ'])) ? "Sim" : "Não";
    $caixaDanificadaJ = (isset($_POST['caixaDanificadaJ'])) ? "Sim" : "Não";
    $erosaoJ = (isset($_POST['erosaoJ'])) ? "Sim" : "Não";
    $tubulacaoDanificadaJ = (isset($_POST['tubulacaoDanificadaJ'])) ? "Sim" : "Não";
    $fissuraTrincaJ = (isset($_POST['fissuraTrincaJ'])) ? "Sim" : "Não";
    $tampaDanificadaInexJ = (isset($_POST['tampaDanificadaInexJ'])) ? "Sim" : "Não";
    $okJ = (isset($_POST['okJ'])) ? "Sim" : "Não";

    $observacaoMontante= mysqli_real_escape_string($link,$_POST['observacaoMontante']);
    $observacaoJusante= mysqli_real_escape_string($link,$_POST['observacaoJusante']);

    $edit = 1;

    $identificacao = $_POST['identificacao'];

    $destination="";
    $destination2="";
    $destination3="";
    $destination4="";

    //error_reporting(-1); // ALL messages error
    //ini_set('display_errors', 'On');//Exibe mensagens de erro

    //Criar diretórios com a data do dia
    $diretorio = "fotos_ficha/drenagem_profunda".str_replace('/', '-', date("d/m/Y"));
    if (!file_exists($diretorio)){
        mkdir($diretorio, 0777);
    }

    //echo "Foto1: ".$_POST['foto1dir']." <br>";
    //echo "Foto2: ".$_POST['foto2dir']." <br>";
    //print_r($_FILES);
   //Processo de renomeação e armazenamento no diretório /fotos_ficha   
   //Foto1
    if (isset($_FILES ['foto1M']) && !empty($_FILES["foto1M"]["name"])){  
        //Se tiver alguma foto salva ela será deletada
        if (!empty($_POST['foto1Mdir'])){
            unlink($_POST['foto1Mdir']);
        }
        
        $currentName = $_FILES ['foto1M']['name']; 
        $parts = explode(".",$currentName);
        $extension = array_pop($parts);
        $newName = $identificacao;
        $destination = "{$diretorio}/{$newName}_foto1M.{$extension}";
    
        //echo ( "Arquivo:".$_FILES [ 'foto1_ficha'][ 'name' ]."\ n");
        //echo ( gettype ( $_FILES [ 'foto1_ficha' ] [ 'name' ]));

        if ( move_uploaded_file ( $_FILES ['foto1M']['tmp_name'] , $destination)) {
        // echo  "Arquivo 1 enviado com sucesso! \ n" ;
        } 
        else {
        // echo  "Erro, o arquivo 1 nao enviado! \ n" ;
        }
    }
        //Foto2
    if (isset($_FILES ['foto2M']) && !empty($_FILES["foto2M"]["name"])){
         //Se tiver alguma foto salva ela será deletada
        if (!empty($_POST['foto2Mdir'])){
            unlink($_POST['foto2Mdir']);
        }
        $currentName2 = $_FILES ['foto2M']['name']; 
        $parts2 = explode(".",$currentName2);
        $extension2 = array_pop($parts2);
        $destination2 = "{$diretorio}/{$newName}_foto2M.{$extension2}";

        if ( move_uploaded_file ( $_FILES ['foto2M']['tmp_name'] , $destination2)) {
            // echo  "Arquivo 2 enviado com sucesso! \ n" ;
        } 
        else {
            // echo  "Erro, o arquivo 2 nao enviado! \ n" ;'
        }
    }

    //Foto3
    if (isset($_FILES ['foto1J']) && !empty($_FILES["foto1J"]["name"])){
        //Se tiver alguma foto salva ela será deletada
        if (!empty($_POST['foto1Jdir'])){
            unlink($_POST['foto1Jdir']);
        }
        $currentName3 = $_FILES ['foto1J']['name']; 
        $parts3 = explode(".",$currentName3);
        $extension3 = array_pop($parts3);
        $destination3 = "{$diretorio}/{$newName}_foto1J.{$extension3}";

        if ( move_uploaded_file ( $_FILES ['foto1J']['tmp_name'] , $destination3)) {
            // echo  "Arquivo 3 enviado com sucesso! \ n" ;
        } 
        else {
            // echo  "Erro, o arquivo 3 nao enviado! \ n" ;'
        }
    }

    //Foto4
    if (isset($_FILES ['foto2J']) && !empty($_FILES["foto2J"]["name"])){
        //Se tiver alguma foto salva ela será deletada
        if (!empty($_POST['foto2Jdir'])){
            unlink($_POST['foto2Jdir']);
        }
        $currentName4 = $_FILES ['foto2J']['name']; 
        $parts4 = explode(".",$currentName4);
        $extension4 = array_pop($parts4);
        $destination4 = "{$diretorio}/{$newName}_foto2J.{$extension4}";

        if ( move_uploaded_file ( $_FILES ['foto2J']['tmp_name'] , $destination4)) {
            // echo  "Arquivo 4 enviado com sucesso! \ n" ;
        } 
        else {
            // echo  "Erro, o arquivo 4 nao enviado! \ n" ;'
        }
    }

    $sql = "UPDATE drenagem_profunda SET data = '$data', assoreadoM = '$assoreadoM', afogadoM = '$afogadoM', limpezaM = '$limpezaM', testaAlaDanificadaM = '$testaAlaDanificadaM', caixaDanificadaM = '$caixaDanificadaM', erosaoM = '$erosaoM', tubulacaoDanificadaM = '$tubulacaoDanificadaM', fissuraTrincaM = '$fissuraTrincaM',  tampaDanificadaInexM = '$tampaDanificadaInexM', okM = '$okM', assoreadoJ = '$assoreadoJ', afogadoJ = '$afogadoJ', limpezaJ = '$limpezaJ', testaAlaDanificadaJ = '$testaAlaDanificadaJ', caixaDanificadaJ = '$caixaDanificadaJ', erosaoJ = '$erosaoJ', tubulacaoDanificadaJ = '$tubulacaoDanificadaJ', fissuraTrincaJ = '$fissuraTrincaJ',  tampaDanificadaInexJ = '$tampaDanificadaInexJ', okJ = '$okJ', observacaoMontante = '$observacaoMontante', observacaoJusante = '$observacaoJusante', edit = '$edit', foto1M = '$destination', foto2M = '$destination2', foto1J = '$destination3', foto2J = '$destination4' WHERE codAuto = '$codAuto'";
    $update = mysqli_query($link, $sql);

   if($update === TRUE){
       // echo "Editado";
        $_SESSION['editado'] = true;
   }else{
        //echo "Não editado";
        //echo "Error updating record: ".mysqli_error($link);
        $_SESSION['editado'] = false;
   }
   $link->close();
  echo("<script>location.href='view_editar_dp.php?id={$codAuto}';</script>");
?>