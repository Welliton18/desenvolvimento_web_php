<?php

include '../html.php';
include_once '../persistencia.php';
include_once '../conexao/conexao.php';

    montaTela();
    
    function montaTela() {
        $oHtml = new Html();
        $oHtml->criaBotaoVoltar('produto.php');
        $oHtml->criaFormulario('');
        $oHtml->criaCampo('SERIAL' , 'codigo'            , 'Código'               , null       , ['disabled' => 'disabled']);
        $oHtml->criaCampo('TEXT'   , 'nome'              , 'Nome'                 , null       , ['required' => 'required']);
        $oHtml->criaCampo('TEXT'   , 'marca'             , 'Marca'                , null       , ['required' => 'required']);
        $oHtml->criaCampo('NUMBER' , 'valor'             , 'Valor'                , null       , ['required' => 'required']);
        $oHtml->criaCampo('NUMBER' , 'quantidade_estoque', 'Quantidade em Estoque', null       , ['required' => 'required']);
        $oHtml->criaCampo('SUBMIT' , 'incluir'           , 'Incluir'              , 'Confirmar', ['required' => 'required']);
        $oHtml->fechaFormulario();
    }
    
    if(isset($_POST['incluir'])){
        $oPersistencia = new Persistencia();
        $oPersistencia->incluirProduto($_POST);
        $_POST = [];
        header('Location: produto.php');
    }
    

