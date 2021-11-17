<?php
    if (isset($_GET['codigo']))
        $codigo = $_GET['codigo'];
 
    try {
        if (isset($codigo)) {
            $stmt = $conn->prepare('SELECT * FROM produto WHERE codigo = :codigo');
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare('SELECT * FROM produto');
        }
        $stmt->execute();
   
        $result = $stmt->fetchAll();
?>
<table border="1" class="table table-striped">
<tr>
            <td>Código</td>
            <td>Nome</td>
            <td>Valor</td>
            <td>Marca</td>
            <td>Quantidade em Estoque</td>
            <td>Ação</td>
</tr>
<?php
        if ( count($result) ) {
            foreach($result as $row) {
                ?>
                <tr>
                    <td><?=$row['codigo']?></td>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['valor']?></td>
                    <td><?=$row['marca']?></td>
                    <td><?=$row['quantidade_estoque']?></td>
                    <td>
                        <a href="?modulo=produtos&pagina=alterar&codigo=<?=$row['codigo']?>">Alterar</a>
                        <a href="?modulo=produtos&pagina=deletar&codigo=<?=$row['codigo']?>">Excluír</a>
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
