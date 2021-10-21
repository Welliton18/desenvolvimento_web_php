<?php
    echo '<form method="post">';
    echo '<table>';
    echo '<tr>';
    $aResult = getAllProdutos();
    foreach ($aResult[0] as $key => $value) {
        !is_numeric($key) ? criaColunaCabecalho($key) : true;
    }
    echo '</tr>';
    foreach ($aResult as $aLinha) {
        echo '<tr>';
        foreach ($aLinha as $sNome => $xValorLinha) {
            !is_numeric($sNome) ? criaColuna($sNome, $xValorLinha) : true;
        }
        $iIdProduto = $aLinha['id'];
        echo "<td><input type='submit' name='alterarProduto_{$iIdProduto}' value='Alterar'></td>";
        echo "<td><input type='submit' name='excluirProduto_{$iIdProduto}' value='Excluir'></td>";
        echo '<td><button><a href="alterar_produto.php">Alterar</a></button></td>';
        echo '</tr>';
    }
    echo '</form>'
    ?>
    