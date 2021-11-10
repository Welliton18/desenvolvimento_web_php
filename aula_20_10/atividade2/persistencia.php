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

    public function excluirProduto($iValor){
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "DELETE FROM PRODUTO 
              WHERE codigo = {$iValor}");
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
            "select coalesce(max(codigo), 0)+1 as codigo from PRODUTO");
        $oSql->execute();
        return $oSql->fetchAll()[0]['codigo'];
    }
    
    public function getProdutoByCodigo($iCodigo){
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "SELECT codigo,
                    nome,
                    marca,
                    valor,
                    quantidade_estoque
               FROM PRODUTO 
              WHERE codigo = {$iCodigo}");
        $oSql->execute();
        return $oSql->fetchAll()[0];
    }
    
    public function updateProduto($aValores) {
        $oConexao = new Conexao();
        $oSql = $oConexao->getSql()->prepare(
            "UPDATE PRODUTO 
                SET nome = '{$aValores['nome']}',
                    marca = '{$aValores['marca']}',
                    valor = {$aValores['valor']},
                    quantidade_estoque = {$aValores['quantidade_estoque']} 
              WHERE codigo = {$aValores['codigo']}");
        return $oSql->execute();
    }

}