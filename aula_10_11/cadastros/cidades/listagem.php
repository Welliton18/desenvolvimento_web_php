<?php
    if (isset($_GET['id']))
        $id = $_GET['id'];
 
    try {
        $oSql = 'SELECT cidades.id as id, 
                        cidades.codigo as codigo,
                        cidades.nome as nome,
                        estados.nome as estado
                   FROM cidades 
                   JOIN estados on cidades.estado = estados.id';
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
            <td>Código</td>
            <td>Nome</td>
            <td>Estado</td>
            <td>Ação</td>
</tr>
<?php
        if ( count($result) ) {
            foreach($result as $row) {
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['codigo']?></td>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['estado']?></td>
                    <td>
                        <a href="?modulo=cidades&pagina=alterar&id=<?=$row['id']?>">Alterar</a>
                        <a href="?modulo=cidades&pagina=deletar&id=<?=$row['id']?>">Excluír</a>
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
