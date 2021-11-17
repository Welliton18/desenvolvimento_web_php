<?php
    if (isset($_POST['deletar'])) {
        try {
            $stmt = $conn->prepare(
                'DELETE FROM produto WHERE codigo = :codigo');
            $stmt->execute(array('codigo' => $_GET['codigo']));
            ?>
                <div class="alert alert-success" role="alert">
                    Sucesso! O registro foi deletado.
                </div>
            <?php
            exit();
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
    <input type="text" name="nome" value="<?=$r[0]['nome']?>" disabled>
    Deseja realmente excluír esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>
