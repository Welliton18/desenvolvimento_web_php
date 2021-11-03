<?php

include ''

    montaTela();
    
    function montaTela() {
        $oHtml = new Html();
        $oHtml->criaFormulario();
        $oHtml->criaCampo('SERIAL' , 'codigo'            , 'Código'               , null       , ['disabled' => 'disabled']);
        $oHtml->criaCampo('TEXT'   , 'nome'              , 'Nome'                 , null       , ['required' => 'required']);
        $oHtml->criaCampo('TEXT'   , 'marca'             , 'Marca'                , null       , ['required' => 'required']);
        $oHtml->criaCampo('TEXT'   , 'valor'             , 'Valor'                , null       , ['required' => 'required']);
        $oHtml->criaCampo('NUMBER' , 'quantidade_estoque', 'Quantidade em Estoque', null       , ['required' => 'required']);
        $oHtml->criaCampo('SUBMIT' , 'incluir'           , 'Incluir'              , 'Confirmar', ['required' => 'required']);
    }
    

