<?php
ob_start();//solução para o problema de cabeçalho export excel não carregado 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
<?php
    include('dbconnect.php');
    //Define o nome do arquivo a ser exportado
    
    $arquivo = "drenagem_superficial.xls";
    $html = ' ';
    $html .= '<table border="1">';
    $html .='<tr>';
    $html .='<th>codAuto</th>';
    $html .='<th>identificacao2020_2</th>';
    $html .='<th>data</th>';
    $html .='<th>codMonitoramento</th>';
    $html .='<th>elemento</th>';
    $html .='<th>km</th>';
    $html .='<th>kmFinal</th>';
    $html .='<th>estado</th>';
    $html .='<th>rodovia</th>';
    $html .='<th>sentido</th>';
    $html .='<th>corteAterro</th>';
    $html .='<th>altura</th>';
    $html .='<th>larguraFicha</th>';
    $html .='<th>largura</th>';
    $html .='<th>largura2</th>';
    $html .='<th>larguraExterna</th>';
    $html .='<th>ambiente</th>';
    $html .='<th>material</th>';
    $html .='<th>sigla</th>';
    $html .='<th>latitude1</th>';
    $html .='<th>longitude1</th>';
    $html .='<th>latitude2</th>';
    $html .='<th>longitude2</th>';
    $html .='<th>comprimento</th>';
    $html .='<th>tipo</th>';
    $html .='<th>acoes</th>';
    $html .='<th>ok</th>';
    $html .='<th>reparo</th>';
    $html .='<th>extensaoReparo</th>';
    $html .='<th>limpeza</th>';
    $html .='<th>extensaoLimpeza</th>';
    $html .='<th>implantar</th>';
    $html .='<th>extensaoImplantar</th>';
    $html .='<th>estadoConservacao</th>';
    $html .='<th>semSolucaoImediata</th>';
    $html .='<th>tipoSemSolucaoImediata</th>';
    $html .='<th>descricaoOutrosSemSolucaoImediata</th>';
    $html .='<th>observacao</th>';
    $html .='<th>funcionario</th>';
    $html .='<th>marginal</th>';
    $html .='<th>ilha</th>';
    $html .='<th>correcao</th>';
    $html .='<th>dataEnvio</th>';
    $html .='<th>semestre</th>';
    $html .='<th>ano</th>';
    $html .='<th>removido</th>';
    $html .='<th>lote</th>';
    $html .='<th>aguaDissipador</th>';
    $html .='<th>foto1_fichas_nova</th>';
    $html .='<th>foto2_fichas_nova</th>';
    $html .='<th>observacaoAlteracao</th>';
    $html .='<th>sync</th>';
    $html .='<th>edit</th>';     
    $html .='</tr>';

    $sql = "SELECT * FROM drenagem_superficial";
    $consulta = mysqli_query($link, $sql);

    if(mysqli_num_rows($consulta)>0){
        while($ficha = mysqli_fetch_assoc($consulta)){
            $html .='<tr>';
            $html .='<td>'.$ficha["codAuto"].'</td>';
            $html .='<td>'.$ficha["identificacao2020_2"].'</td>';
            $html .='<td>'.$ficha["data"].'</td>';
            $html .='<td>'.$ficha["codMonitoramento"].'</td>';
            $html .='<td>'.$ficha["elemento"].'</td>';
            $html .='<td>'.$ficha["km"].'</td>';
            $html .='<td>'.$ficha["kmFinal"].'</td>';
            $html .='<td>'.$ficha["estado"].'</td>';
            $html .='<td>'.$ficha["rodovia"].'</td>';
            $html .='<td>'.$ficha["sentido"].'</td>';
            $html .='<td>'.$ficha["corteAterro"].'</td>';
            $html .='<td>'.$ficha["altura"].'</td>';
            $html .='<td>'.$ficha["larguraFicha"].'</td>';
            $html .='<td>'.$ficha["largura"].'</td>';
            $html .='<td>'.$ficha["largura2"].'</td>';
            $html .='<td>'.$ficha["larguraExterna"].'</td>';
            $html .='<td>'.$ficha["ambiente"].'</td>';
            $html .='<td>'.$ficha["material"].'</td>';
            $html .='<td>'.$ficha["sigla"].'</td>';
            $html .='<td>'.$ficha["latitude1"].'</td>';
            $html .='<td>'.$ficha["longitude1"].'</td>';
            $html .='<td>'.$ficha["latitude2"].'</td>';
            $html .='<td>'.$ficha["longitude2"].'</td>';
            $html .='<td>'.$ficha["comprimento"].'</td>';
            $html .='<td>'.$ficha["tipo"].'</td>';
            $html .='<td>'.$ficha["acoes"].'</td>';
            $html .='<td>'.$ficha["ok"].'</td>';
            $html .='<td>'.$ficha["reparo"].'</td>';
            $html .='<td>'.$ficha["extensaoReparo"].'</td>';
            $html .='<td>'.$ficha["limpeza"].'</td>';
            $html .='<td>'.$ficha["extensaoLimpeza"].'</td>';
            $html .='<td>'.$ficha["implantar"].'</td>';
            $html .='<td>'.$ficha["extensaoImplantar"].'</td>';
            $html .='<td>'.$ficha["estadoConservacao"].'</td>';
            $html .='<td>'.$ficha["semSolucaoImediata"].'</td>';
            $html .='<td>'.$ficha["tipoSemSolucaoImediata"].'</td>';
            $html .='<td>'.$ficha["descricaoOutrosSemSolucaoImediata"].'</td>';
            $html .='<td>'.$ficha["observacao"].'</td>';
            $html .='<td>'.$ficha["funcionario"].'</td>';
            $html .='<td>'.$ficha["marginal"].'</td>';
            $html .='<td>'.$ficha["ilha"].'</td>';
            $html .='<td>'.$ficha["correcao"].'</td>';
            $html .='<td>'.$ficha["dataEnvio"].'</td>';
            $html .='<td>'.$ficha["semestre"].'</td>';
            $html .='<td>'.$ficha["ano"].'</td>';
            $html .='<td>'.$ficha["removido"].'</td>';
            $html .='<td>'.$ficha["lote"].'</td>';
            $html .='<td>'.$ficha["aguaDissipador"].'</td>';
            $html .='<td>'.$ficha["foto1_fichas_nova"].'</td>';
            $html .='<td>'.$ficha["foto2_fichas_nova"].'</td>';
            $html .='<td>'.$ficha["observacaoAlteracao"].'</td>';
            $html .='<td>'.$ficha["sync"].'</td>';
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