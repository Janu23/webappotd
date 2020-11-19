<?php
    $link = mysqli_connect($_SERVER['SERVER_NAME'], "root", "p_P2345678", "dbotd");
    mysqli_set_charset($link,"utf8");  
    if (!$link) {
        //echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    //echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;
    //mysqli_close($link);
?> 