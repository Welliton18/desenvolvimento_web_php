<?php

    $iPaginaAtual = isset($_GET['paginaAtual']) ? $_GET['paginaAtual'] : 1;
    try {
        $oSqlCount = $conn->prepare('SELECT count(1) from estados');
        $oSqlCount->execute();
        $iQtdRegistros = $oSqlCount->fetchAll()[0][0];
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    if (isset($_GET['id']))
        $id = $_GET['id'];
 
    try {
        $iOffset = ($iPaginaAtual-1) * REGISTROS_PAGINA;
        $oSql = 'SELECT id as id, 
                        sigla as sigla,
                        nome as nome
                   FROM estados 
                  LIMIT '.REGISTROS_PAGINA.'
                 OFFSET '. $iOffset;
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
        echo '</table>';
        
        for ($i=1; $i <= ceil($iQtdRegistros / REGISTROS_PAGINA); $i++) {
            if((int) $iPaginaAtual !== $i){
                echo "<a href='?modulo=estados&pagina=listagem&paginaAtual={$i}' style='margin-right: 4px'>{$i}</a>"; 
            }
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
