<?php
    if (isset($_GET['id']))
        $id = $_GET['id'];
 
    try {
        $oSql = 'SELECT id as id, 
                        sigla as sigla,
                        nome as nome
                   FROM estados ';
        if (isset($id)) {
            $stmt = $conn->prepare($oSql .' WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare($oSql);
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
?>
<table border="1" class="table table-striped">
<tr>
            <td>Id</td>
            <td>Sigla</td>
            <td>Nome</td>
            <td>Ação</td>
</tr>
<?php
        if ( count($result) ) {
            foreach($result as $row) {
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['sigla']?></td>
                    <td><?=$row['nome']?></td>
                    <td>
                        <a href="?modulo=estados&pagina=alterar&id=<?=$row['id']?>">Alterar</a>
                        <a href="?modulo=estados&pagina=deletar&id=<?=$row['id']?>">Excluír</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "Nenhum resultado retornado.";
        }
?>
</table>
<?php
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
