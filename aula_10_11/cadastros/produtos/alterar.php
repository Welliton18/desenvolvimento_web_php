<?php
    if (isset($_POST['alterar'])) {
        try {
            $stmt = $conn->prepare(
                'UPDATE produto SET nome = :nome, valor = :valor, marca = :marca, quantidade_estoque = :quantidade WHERE codigo = :codigo');
            $stmt->execute(array('nome'      => $_POST['nome'],
                                'codigo'     => $_GET['codigo'],
                                'marca'      => $_POST['marca'],
                                'quantidade' => $_POST['quantidade_estoque'],
                                'valor'      => $_POST['valor']));
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
 
    if (isset($_GET['codigo'])) {
        $stmt = $conn->prepare('SELECT * FROM produto WHERE codigo = :codigo');
        $stmt->bindParam(':codigo', $_GET['codigo'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $r = $stmt->fetchAll();
?>
<form method="post">
    <input type="text" maxlength="80" name="nome" value="<?=$r[0]['nome']?>">
    <input type="text" maxlength="80" name="marca" value="<?=$r[0]['marca']?>">
    <input type="number" name="valor" value="<?=$r[0]['valor']?>">
    <input type="number" name="quantidade_estoque" value="<?=$r[0]['quantidade_estoque']?>">
    <input type="submit" name="alterar" value="Salvar">
</form>

