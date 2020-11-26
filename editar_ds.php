<?php 
    session_start();
    include('dbconnect.php');

    $codAuto = $_POST['codAuto'];
    $data = $_POST['data'];
        
    //checkbox e input de extensão sobre diagnóstico já adequando o formato float
    $reparar = $_POST['reparar'] ? "Sim" : "Não";
    $extensaoReparo = floatval(str_replace(',', '.', $_POST['extensaoReparo']));

    $limpeza = $_POST['limpeza'] ? "Sim" : "Não";
    $extensaoLimpeza = floatval(str_replace(',', '.', $_POST['extensaoLimpeza']));

    $implantar = $_POST['implantar'] ? "Sim" : "Não";
    $extensaoImplantar = floatval(str_replace(',', '.', $_POST['extensaoImplantar']));

    $ok = $_POST['ok'] ? "Sim" : "Não";

    /*Se o checkbox de diagnóstico não está marcado. não tem nenhuma extensão a ser verificada*/    
    if ($reparar == "Não"){$extensaoReparo = 0;}
    if ($limpeza == "Não"){$extensaoLimpeza = 0;}
    if ($implantar == "Não"){$extensaoImplantar = 0;}

    //Define status do estado de conservação    
    $extensao = $_POST['extensao'];
    $extensao = floatval(str_replace(',', '.', $extensao));

    if ($extensaoReparo > 0.2*$extensao || $extensaoLimpeza > 0.2*$extensao){
        $estadoConservacao = "Precário";
    }else if($extensaoReparo == 0 && $extensaoLimpeza ==0){
        $estadoConservacao = "Bom";
    } else if ($extensaoReparo <= 0.2*$extensao || $extensaoLimpeza <= 0.2*$extensao){
        $estadoConservacao = "Regular";
    } 

    $identificacao = $_POST['identificacao'];

    $destination="";
    $destination2="";

    error_reporting(-1); // ALL messages error
    ini_set('display_errors', 'On');//Exibe mensagens de erro

    //Criar diretórios com a data do dia
    $diretorio = "fotos_ficha/".str_replace('/', '-', date("d/m/Y"));
    if (!file_exists($diretorio)){
        mkdir($diretorio, 0777);

    }

    //echo "Foto1: ".$_POST['foto1dir']." <br>";
    //echo "Foto2: ".$_POST['foto2dir']." <br>";
    //print_r($_FILES);
   //Processo de renomeação e armazenamento no diretório /fotos_ficha   
   //Foto1
    if (isset($_FILES ['foto1_ficha']) && !empty($_FILES["foto1_ficha"]["name"])){  
        //Se tiver alguma foto salva ela será deletada
        if (!empty($_POST['foto1dir'])){
            unlink($_POST['foto1dir']);
        }
        
        $currentName = $_FILES ['foto1_ficha']['name']; 
        $parts = explode(".",$currentName);
        $extension = array_pop($parts);
        $newName = $identificacao;
        $destination = "{$diretorio}/{$newName}_foto1.{$extension}";
    
        //echo ( "Arquivo:".$_FILES [ 'foto1_ficha'][ 'name' ]."\ n");
        //echo ( gettype ( $_FILES [ 'foto1_ficha' ] [ 'name' ]));

        if ( move_uploaded_file ( $_FILES ['foto1_ficha']['tmp_name'] , $destination)) {
        // echo  "Arquivo 1 enviado com sucesso! \ n" ;
        } 
        else {
        // echo  "Erro, o arquivo 1 nao enviado! \ n" ;
        }
    }
        //Foto2
    if (isset($_FILES ['foto2_ficha']) && !empty($_FILES["foto2_ficha"]["name"])){
         //Se tiver alguma foto salva ela será deletada
        if (!empty($_POST['foto2dir'])){
            unlink($_POST['foto2dir']);
        }
        $currentName2 = $_FILES ['foto2_ficha']['name']; 
        $parts2 = explode(".",$currentName2);
        $extension2 = array_pop($parts2);
        $destination2 = "{$diretorio}/{$newName}_foto2.{$extension2}";

        if ( move_uploaded_file ( $_FILES ['foto2_ficha']['tmp_name'] , $destination2)) {
            // echo  "Arquivo 2 enviado com sucesso! \ n" ;
        } 
        else {
            // echo  "Erro, o arquivo 2 nao enviado! \ n" ;'
        }
    }

   $observacao= mysqli_real_escape_string($link,$_POST['observacao']);
   $observacaoAlteracao= mysqli_real_escape_string($link,$_POST['observacaoAlteracao']);

    $edit = 1;

   $sql = "UPDATE drenagem_superficial SET data = '$data',  ok = '$ok', reparo = '$reparar', extensaoReparo = '$extensaoReparo', limpeza = '$limpeza', extensaoLimpeza = '$extensaoLimpeza', implantar = '$implantar', extensaoImplantar = '$extensaoImplantar', estadoConservacao = '$estadoConservacao', observacao = '$observacao', foto1_fichas_nova = '$destination', foto2_fichas_nova = '$destination2', observacaoAlteracao = '$observacaoAlteracao', edit = '$edit' WHERE codAuto = '$codAuto'";
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
   echo("<script>location.href='view_editar_ds.php?id={$codAuto}';</script>");
?>