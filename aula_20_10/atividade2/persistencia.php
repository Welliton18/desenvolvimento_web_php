<?php

    function getUsuarioLogin($sLogin, $sSenha){
        include_once 'conexao.php';
        
        $oSql = $oConn->prepare(
            "SELECT *
               FROM USUARIOS 
              WHERE login = '{$sLogin}'
                and password = md5('{$sSenha}')");
        $oSql->execute();
        return $oSql->fetchAll();
    }
