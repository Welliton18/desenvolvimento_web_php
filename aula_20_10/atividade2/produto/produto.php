<?php

use produto\ConsultaProduto;

include_once 'consulta_produto.php';
include_once '../html.php';
include_once '../persistencia.php';
include_once '../conexao/conexao.php';

    if(isset($_POST['incluir'])){
        $oPersistencia = new Persistencia();
        $oPersistencia->incluirProduto($_POST);
        $_POST = [];
    } else if(isset($_POST['alterar'])){
        $oPersistencia = new Persistencia();
        $oPersistencia->updateProduto($_POST);
        $_POST = [];
    } else {
        $iCodigo = false;
        foreach ($_POST as $sKey => $sPost) {
            $iCodigo = trim($sKey, 'excluirProduto_');
        }
        if(is_numeric($iCodigo)){
            $oPersistencia = new Persistencia();
            $oPersistencia->excluirProduto($iCodigo);
            $_POST = [];
        }
    }

    $oConsulta = new ConsultaProduto();
    $oConsulta->criaTela();
