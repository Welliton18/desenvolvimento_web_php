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
    }

    $oConsulta = new ConsultaProduto();
    $oConsulta->criaTela();
