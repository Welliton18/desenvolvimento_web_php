<?php

use conexao\Conexao;

class Persistencia {

    public function getUsuarioLogin($sLogin, $sSenha){
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "SELECT *
               FROM USUARIOS 
              WHERE login = '{$sLogin}'
                and password = md5('{$sSenha}')");
        $oSql->execute();
        return $oSql->fetchAll();
    }

    public function getAllProdutos(){
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "SELECT codigo                       as 'Código',
                    nome                         as 'Nome do Produto',
                    marca                        as 'Marca do Produto',
                    valor                        as 'Valor do Produto',
                    quantidade_estoque           as 'Quantidade em Estoque',
                    (valor * quantidade_estoque) as 'Valor total em Estoque (R$)'
               FROM PRODUTO ");
        $oSql->execute();
        return $oSql->fetchAll();
    }

    public function excluirProduto($xValor){
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "DELETE PRODUTO 
              WHERE codigo = {$xValor}");
        return $oSql->execute();
    }
    
    public function incluirProduto($aValores) {
        $oConexao = new Conexao();
        $sSql = "INSERT INTO PRODUTO(codigo, ";
        foreach ($aValores as $sKey => $value) {
            if($value === 'Confirmar'){
                continue;
            }
            $sSql.= "{$sKey}, ";
        }
        $sSql = substr($sSql, 0, -2) . ") values('{$this->getUltimoCodigo()}', ";
        foreach ($aValores as $value) {
            if($value === 'Confirmar'){
                continue;
            }
            $sSql.= "'{$value}', ";
        }
        $sSql = substr($sSql, 0, -2).')';
        $oSql = $oConexao->getSql()->prepare($sSql);
        $oSql->execute();
    }
    
    public function getUltimoCodigo() {
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "select max(codigo)+1 as codigo from PRODUTO");
        $oSql->execute();
        return $oSql->fetchAll()[0]['codigo'];
    }

}