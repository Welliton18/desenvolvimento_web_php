<?php

    $iPaginaAtual = isset($_GET['paginaAtual']) ? $_GET['paginaAtual'] : 1;
    try {
        $oSqlCount = $conn->prepare('SELECT count(1) from produto');
        $oSqlCount->execute();
        $iQtdRegistros = $oSqlCount->fetchAll()[0][0];
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    if (isset($_GET['codigo']))
        $codigo = $_GET['codigo'];
 
    try {
        $iOffset = ($iPaginaAtual-1) * REGISTROS_PAGINA;
        if (isset($codigo)) {
            $stmt = $conn->prepare('SELECT * FROM produto WHERE codigo = :codigo');
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare('SELECT * 
                                      FROM produto 
                                     LIMIT '.REGISTROS_PAGINA.'
                                    OFFSET '. $iOffset);
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
        echo '</table>';
        
        for ($i=1; $i <= ceil($iQtdRegistros / REGISTROS_PAGINA); $i++) {
            if((int) $iPaginaAtual !== $i){
                echo "<a href='?modulo=produtos&pagina=listagem&paginaAtual={$i}' style='margin-right: 4px'>{$i}</a>"; 
            }
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
