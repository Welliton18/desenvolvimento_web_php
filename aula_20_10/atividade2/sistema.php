<?php

    if(!isset($_SESSION['usuario'])){
        echo 'Falha no sistema</br>
              Você precisa se autenticar!</br>
              <a href="index.php">Voltar</a>';
        exit();
    }

?>

<a href="?desconectar=true">Desconectar</a>
<hr>
<h1>Olá <?= $_SESSION['usuario']?></h1>
