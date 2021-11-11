<?php
    if (isset($_POST['alterar'])) {
        try {
            $stmt = $conn->prepare(
                "UPDATE cidades 
                    SET codigo = {$_POST['codigo']}, 
                        nome   = '{$_POST['nome']}', 
                        estado = '{$_POST['estado']}' 
                  WHERE id = {$_POST['id']}");
            //$stmt->execute();
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
 
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT * FROM cidades WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $r = $stmt->fetchAll();
?>
<form method="post">
    <input type="text" name="nome" value="<?=$r[0]['nome']?>">
    <input type="submit" name="alterar" value="Salvar">
</form>

