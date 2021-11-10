<?php

class Html{
    
    public function criaColuna($sNome, $xValor){
        echo "<td style='border:1px solid' name='$sNome'>{$xValor}</td>";
    }

    public function criaColunaCabecalho($sNome, $iTamanho = 200){
        echo "<th style='border:1px solid' name='$sNome' width='$iTamanho'px>{$sNome}</th>";
    }
    
    public function criaFormulario($sAction = null, $sMethod = 'post') {
        echo "<form action='{$sAction}' method='{$sMethod}'>";
    }
    
    public function fechaFormulario() {
        echo "</form>";
    }
    
    public function criaCampo($sTipo, $sNome, $sTitulo, $xValue = null, array $aAtributos = []) {
        $sCampo = "<input type='{$sTipo}' name='{$sNome}' id='{$sNome}' placeholder='{$sTitulo}' value='{$xValue}'";
        foreach ($aAtributos as $sKey => $sAtributo) {
            $sCampo.=" {$sKey}='{$sAtributo}'";
        }
        echo "{$sCampo}><br>";
    }
    
    public function criaBotaoVoltar($sAction = '../') {
        echo "<form action='{$sAction}' method='POST'>";
        echo "<input type='submit' name='voltar' value='Voltar'></td>";
        echo '</form>';
    }
    
    public function criaBotaoIncluir() {
        echo '<form action="incluir_produto.php" method="POST">';
        echo '<input type="submit" name="incluir_produto" value="Incluir">';
        echo '</form>';
    }
    
    public function criaBotaoAlterar($iCodigo) {
        echo '<td><form action="alterar_produto.php" method="POST">';
        echo "<input type='submit' name='alterarProduto_{$iCodigo}' value='Alterar'>";
        echo '</form></td>';
    }
    
    public function criaBotaoExcluir($iCodigo) {
        echo '<td><form method="POST">';
        echo "<input type='submit' name='excluirProduto_{$iCodigo}' value='Excluir'>";
        echo '</form></td>';
    }
}

?>

