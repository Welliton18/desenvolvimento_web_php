<?php

include '../html.php';
include '../persistencia.php';
include '../conexao/conexao.php';
    if(!isset($_POST['alterar'])){
        montaTela();
    } else {
        alterarProduto();
    }

    function montaTela() {
        $aProduto = getDadosProduto();
        $oHtml = new Html();
        $oHtml->criaBotaoVoltar('produto.php');
        $oHtml->criaFormulario('');
        $oHtml->criaCampo('SERIAL' , 'codigo'            , 'Código'               , $aProduto['codigo']            , ['readOnly' => 'readOnly']);
        $oHtml->criaCampo('TEXT'   , 'nome'              , 'Nome'                 , $aProduto['nome']              , ['required' => 'required']);
        $oHtml->criaCampo('TEXT'   , 'marca'             , 'Marca'                , $aProduto['marca']             , ['required' => 'required']);
        $oHtml->criaCampo('NUMBER' , 'valor'             , 'Valor'                , $aProduto['valor']             , ['required' => 'required']);
        $oHtml->criaCampo('NUMBER' , 'quantidade_estoque', 'Quantidade em Estoque', $aProduto['quantidade_estoque'], ['required' => 'required']);
        $oHtml->criaCampo('SUBMIT' , 'alterar'           , 'Alterar'              , 'Confirmar');
        $oHtml->fechaFormulario();
    }
    
    function getDadosProduto(){
        foreach ($_POST as $sKey => $sPost) {
            $iCodigo = trim($sKey, 'alterarProduto_');
        }
        $oSql = new Persistencia();
        return $oSql->getProdutoByCodigo($iCodigo);
    }
    
    function alterarProduto(){
        $oPersistencia = new Persistencia();
        $oPersistencia->updateProduto($_POST);
        $_POST = [];
        header('Location: produto.php');
    }


    