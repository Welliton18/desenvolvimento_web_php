<?php

    if(isset($_POST['logar'])){
        $aResult = getUsuarioLogin($_POST['login'], $_POST['senha']);
        if(!empty($aResult)){
            $_SESSION['usuario'] = $aResult[0]['nome'];
            header('Location: index.php');
        } else  {
            echo 'Login ou senha incorretos';
        }
    }
?>

<form method="post">
    <input type="text" name="login" id="login" required placeholder="Usuário">
    </br>
    <input type="password" name="senha" id="senha" required placeholder="Senha">
    </br>
    <input type="submit" name='logar'>
</form>

