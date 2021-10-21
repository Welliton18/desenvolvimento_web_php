<?php

include '../persistencia.php';
include '../html.php';
include 'consulta_produto.php';

for ($i=0; $i < 100; $i++) { 
    if(isset($_POST["excluirProduto_{$i}"])){
        excluirProduto($i);
        $i = 100;
    }
}

