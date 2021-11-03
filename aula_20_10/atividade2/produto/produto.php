<?php

use produto\ConsultaProduto,
    produto\IncluirProduto;

include_once 'consulta_produto.php';
include_once 'incluir_produto.php';
include_once '../html.php';
include_once '../persistencia.php';
include_once '../conexao/conexao.php';

    if(isset($_POST['incluir_produto'])){
        $oInclusao = new IncluirProduto();
    }
    if(isset($_POST['incluir'])){
        $oPersistencia = new Persistencia();
        $oPersistencia->incluirProduto($_POST);
        $_POST = [];
    }

    $oConsulta = new ConsultaProduto();
    $oConsulta->criaTela();
