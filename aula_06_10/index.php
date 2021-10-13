<?php

    include 'conexao.php';
    include 'html.php';

    $oSql = $oConn->prepare(
        'SELECT CIDADES.CODIGO AS CODIGO,
                CIDADES.NOME   AS NOME,
                ESTADOS.SIGLA  AS ESTADO_SIGLA,
                ESTADOS.NOME   AS ESTADO_NOME
           FROM CIDADES
           JOIN ESTADOS
             ON CIDADES.ESTADO = ESTADOS.ID');

    $oSql->execute();
    $aResult = $oSql->fetchAll();
    $aNomeColunas = ['Código da Cidade', 'Nome da Cidade', 'Sigla do Estado', 'Nome do Estado'];
    echo '<table>';
    echo '<tr>';
    foreach ($aNomeColunas as $sNomeColunas) {
        criaColunaCabecalho($sNomeColunas);
    }
    echo '</tr>';
    foreach ($aResult as $aLinha) {
        echo '<tr>';
        foreach ($aLinha as $sNome => $xValorLinha) {
            !is_numeric($sNome) ? criaColuna($sNome, $xValorLinha) : true;
        }
        echo '</tr>';
    }
    echo' </table>';

       
?>