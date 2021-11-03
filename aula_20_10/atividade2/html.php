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
    
}

?>

