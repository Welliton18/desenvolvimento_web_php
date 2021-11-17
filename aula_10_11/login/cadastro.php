<?php
    include "../bibliotecas/parametros.php";
    include "../bibliotecas/conexao.php";
    
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO usuarios (nome, login, email, password) values (:nome, :login, :email, md5(:password))');
            if($stmt->execute([
                'nome'     => $_POST['nome'],
                'login'    => $_POST['login'],
                'email'    => $_POST['email'],
                'password' => $_POST['senha']
            ])){
                $_SESSION['login'] = $_POST['nome'];
                header('Location: ../index.php');
            } else {
                echo 'Não foi possível cadastrar este usuário';
            }
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
        <br>
        <label for="nome">Login</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Login">
        <br>
        <label for="nome">E-Mail</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail">
        <br>
        <label for="nome">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
        <br>
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
