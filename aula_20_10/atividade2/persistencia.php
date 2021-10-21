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

    function getAllProdutos(){
        include_once 'conexao.php';
        
        $oSql = $oConn->prepare(
            "SELECT * 
               FROM cidades ");
        $oSql->execute();
        return $oSql->fetchAll();
    }

    function excluirProduto($xValor){
        include_once 'conexao.php';
        
        $oSql = $oConn->prepare(
            "DELETE * 
               FROM cidades 
              WHERE ID = {$xValor}");
        return $oSql->execute();
    }