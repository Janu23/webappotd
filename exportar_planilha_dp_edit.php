<?php
ob_start();//solução para o problema de cabeçalho export excel não carregado 
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
<?php
   
    //Define o nome do arquivo a ser exportado
    
    $arquivo = "drenagem_profunda_editada.xls";
    $html = ' ';
    $html .= '<table border="1">';
    $html .='<tr>';
    $html .='<th>codAuto</th>';
    $html .='<th>Identificacao</th>';
    $html .='<th>Extensao</th>';
    $html .='<th>KM Inicial</th>';
    $html .='<th>KM Final</th>';
    $html .='<th>Tipo Bueiro</th>';
    $html .='<th>Forma</th>';
    $html .='<th>Rodovia</th>';
    $html .='<th>Dimensoes Montante</th>';
    $html .='<th>Lado Montante</th>';
    $html .='<th>Dispositivo Entrada Montante</th>';
    $html .='<th>Material Montante</th>';
    $html .='<th>Estado de Conservacao Montante</th>';
    $html .='<th>Latitude Montante</th>';
    $html .='<th>Longitude Montante</th>';
    $html .='<th>Dimensoes Jusante</th>';
    $html .='<th>Lado Jusante</th>';
    $html .='<th>Estrutura Saida Jusante</th>';
    $html .='<th>Material Jusante</th>';
    $html .='<th>Estado de Conservacao Jusante</th>';
    $html .='<th>Latitude Jusante</th>';
    $html .='<th>Longitude Jusante</th>';
    $html .='<th>Ok Montante</th>';
    $html .='<th>Limpeza Montante</th>';
    $html .='<th>Assoreado Montante</th>';
    $html .='<th>Afogado Montante</th>';
    $html .='<th>TestaAlaDanificada Montante</th>';
    $html .='<th>Tubulacao Danificada Montante</th>';
    $html .='<th>Caixa Danificada Montante</th>';
    $html .='<th>Erosão Montante</th>';
    $html .='<th>FissuraTrinca Montante</th>';
    $html .='<th>TampaDanificadaInexist Montante</th>';
    $html .='<th>Ok Jusante</th>';
    $html .='<th>Limpeza Jusante</th>';
    $html .='<th>Assoreado Jusante</th>';
    $html .='<th>Afogado Jusante</th>';
    $html .='<th>TestaAlaDanificada Jusante</th>';
    $html .='<th>Tubulacao Danificada Jusante</th>';
    $html .='<th>Caixa Danificada Jusante</th>';
    $html .='<th>Erosão Jusante</th>';
    $html .='<th>FissuraTrinca Jusante</th>';
    $html .='<th>TampaDanificadaInexist Jusante</th>';
    $html .='<th>data</th>';
    $html .='<th>foto1M</th>';
    $html .='<th>foto2M</th>';
    $html .='<th>foto1J</th>';
    $html .='<th>foto2J</th>';
    $html .='<th>observacao Montante</th>';
    $html .='<th>observacao Jusante</th>';
    $html .='<th>edit</th>';   
    $html .='</tr>';

    if ($_SESSION['inicioTrecho']=="" && $_SESSION['finalTrecho']==""){
        $sql = "SELECT * FROM drenagem_profunda WHERE edit = 1 AND editM = 1 AND editJ = 1";
    }
    $consulta = mysqli_query($link, $sql);

    if(mysqli_num_rows($consulta)>0){
        while($ficha = mysqli_fetch_assoc($consulta)){
            $html .='<tr>';
            $html .='<td>'.$ficha["codAuto"].'</td>';
            $html .='<td>'.$ficha["identificacao"].'</td>';
            $html .='<td>'.$ficha["extensao"].'</td>';
            $html .='<td>'.$ficha["kmInicial"].'</td>';
            $html .='<td>'.$ficha["kmFinal"].'</td>';
            $html .='<td>'.$ficha["tipoBueiro"].'</td>';
            $html .='<td>'.$ficha["forma"].'</td>';
            $html .='<td>'.$ficha["rodovia"].'</td>';
            $html .='<td>'.$ficha["dimensoesM"].'</td>';
            $html .='<td>'.$ficha["ladoM"].'</td>';
            $html .='<td>'.$ficha["dispositivoEntradaM"].'</td>';
            $html .='<td>'.$ficha["materialM"].'</td>';
            $html .='<td>'.$ficha["EstadoConservacaoM"].'</td>';
            $html .='<td>'.$ficha["latitudeM"].'</td>';
            $html .='<td>'.$ficha["longitudeM"].'</td>';
            $html .='<td>'.$ficha["dimensoesJ"].'</td>';
            $html .='<td>'.$ficha["ladoJ"].'</td>';
            $html .='<td>'.$ficha["estruturaSaidaJ"].'</td>';
            $html .='<td>'.$ficha["materialJ"].'</td>';
            $html .='<td>'.$ficha["EstadoConservacaoJ"].'</td>';
            $html .='<td>'.$ficha["latitudeJ"].'</td>';
            $html .='<td>'.$ficha["longitudeJ"].'</td>';
            $html .='<td>'.$ficha["okM"].'</td>';
            $html .='<td>'.$ficha["limpezaM"].'</td>';
            $html .='<td>'.$ficha["assoreadoM"].'</td>';
            $html .='<td>'.$ficha["afogadoM"].'</td>';
            $html .='<td>'.$ficha["testaAlaDanificadaM"].'</td>';
            $html .='<td>'.$ficha["tubulacaoDanificadaM"].'</td>';
            $html .='<td>'.$ficha["caixaDanificadaM"].'</td>';
            $html .='<td>'.$ficha["erosaoM"].'</td>';
            $html .='<td>'.$ficha["fissuraTrincaM"].'</td>';
            $html .='<td>'.$ficha["tampaDanificadaInexM"].'</td>';
            $html .='<td>'.$ficha["okJ"].'</td>';
            $html .='<td>'.$ficha["limpezaJ"].'</td>';
            $html .='<td>'.$ficha["assoreadoJ"].'</td>';
            $html .='<td>'.$ficha["afogadoJ"].'</td>';
            $html .='<td>'.$ficha["testaAlaDanificadaJ"].'</td>';
            $html .='<td>'.$ficha["tubulacaoDanificadaJ"].'</td>';
            $html .='<td>'.$ficha["caixaDanificadaJ"].'</td>';
            $html .='<td>'.$ficha["erosaoJ"].'</td>';
            $html .='<td>'.$ficha["fissuraTrincaJ"].'</td>';
            $html .='<td>'.$ficha["tampaDanificadaInexJ"].'</td>';
            $html .='<td>'.$ficha["data"].'</td>';
            $html .='<td>'.$ficha["foto1M"].'</td>';
            $html .='<td>'.$ficha["foto2M"].'</td>';
            $html .='<td>'.$ficha["foto1J"].'</td>';
            $html .='<td>'.$ficha["foto2J"].'</td>';
            $html .='<td>'.$ficha["observacaoMontante"].'</td>';
            $html .='<td>'.$ficha["observacaoJusante"].'</td>';
            $html .='<td>'.$ficha["edit"].'</td>';
            $html .='</tr>';
        }
        $html .= '</table>';
    }
    // Configurações header para forçar o download
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
    // Envia o conteúdo do arquivo                            
    echo $html;
    exit;  
    ob_end_flush();   
?>
	</body>
</html>