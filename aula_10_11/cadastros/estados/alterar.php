<?php
    if (isset($_POST['alterar'])) {
        try {
            $stmt = $conn->prepare(
                "UPDATE estados 
                    SET id    = {$_POST['id']}, 
                        sigla = '{$_POST['sigla']}', 
                        nome  = '{$_POST['nome']}' 
                  WHERE id = {$_POST['id']}");
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
 
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT * FROM estados WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $r = $stmt->fetchAll();
?>
<form method="post">
    <input type="text" name="sigla" value="<?=$r[0]['sigla']?>">
    <input type="text" name="nome" value="<?=$r[0]['nome']?>">
    <input type="submit" name="alterar" value="Salvar">
</form>

