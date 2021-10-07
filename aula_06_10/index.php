<?php

    include 'conexao.php';
    $oSql = $oConn->prepare(
        'SELECT CIDADES.*,
                ESTADOS.SIGLA AS ESTADO_SIGLA,
                ESTADOS.NOME  AS ESTADO_NOME
           FROM CIDADES, ESTADOS
          WHERE CIDADES.ESTADO = ESTADOS.ID');

    $oSql->execute();
    $aResult = $oSql->fetchAll();
    print_r($aResult);

    foreach ($aResult as $value) {
        foreach ($value as $key => $value) {
            echo $key . ' => ' . $value . '</br>';
        }
    }
    
?>