<?php 

    session_start();
    
    include_once 'conexao.php';
    include_once 'persistencia.php';
    include_once 'html.php';
    
    if(!isset($_SESSION['usuario'])){
        include 'login.php';
    } else {
        include 'sistema.php';
    }

    if(isset($_GET['desconectar']) && $_GET['desconectar'] == 'true'){
        session_destroy();
        header('Location: index.php');
    }