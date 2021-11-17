<?php

    if (isset($_POST['logar'])) {
        try {
            $stmt = $conn->prepare(
                'SELECT * from usuarios where login = :login and password = md5(:senha)');
            $stmt->execute([
                'login' => $_POST['login'],
                'senha' => $_POST['senha']
            ]);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if(!empty($result)){
                echo $result[0]['nome'];
                $_SESSION['login'] = $result[0]['nome'];
                header('Location: index.php');
            } else {
                echo 'Login ou senha incorreto </br></br>';
            }
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Login</label>
        <input type="text" class="form-control" name="login" id="nome" placeholder="Login">
        <label for="nome">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
    </div>
    <input type="submit" name="logar" value="Logar">
    <a href="./login/cadastro.php"class="btn btn-info mx-1 mt-1">Cadastrar</a>
</form>
