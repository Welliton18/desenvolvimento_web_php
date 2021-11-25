<?php

    session_start();

    include "bibliotecas/parametros.php";
    include "bibliotecas/conexao.php";

    include LAYOUTS.'header.php';
    if(isset($_GET['login']) && $_GET['login'] == 'sair'){
        $_SESSION['login'] = null;
        header('Location: index.php');
    }
    if(!isset($_SESSION['login'])){
        include './login/logar.php';
    } else {
        include LAYOUTS.'menu.php';
        if (!isset($_GET['pagina'])){
            include LAYOUTS.'home.php';
        } else {
            $sPagina = strpos($_GET['pagina'], '?') > 0 ? substr($_GET['pagina'], 0, strpos($_GET['pagina'], '?')) : $_GET['pagina'];
            include CADASTROS.$_GET['modulo'].'/'.$sPagina.'.php';
        }
    }
    
    include LAYOUTS.'footer.php';
