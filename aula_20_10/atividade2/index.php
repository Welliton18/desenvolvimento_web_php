<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        include 'login.php';
    } else {
        include 'sistema.php';
    }