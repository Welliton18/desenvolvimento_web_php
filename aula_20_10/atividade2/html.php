<?php

    function criaColuna($sNome, $xValor){
        echo "<td style='border:1px solid' name='$sNome'>{$xValor}</td>";
    }

    function criaColunaCabecalho($sNome, $iTamanho = 200){
        echo "<th style='border:1px solid' name='$sNome' width='$iTamanho'px>{$sNome}</th>";
    }

?>