<?php

class html {
    
    public function __construct() {
        $this->iniciaFormularioCalculadora();
        $this->criaCalculadora();
    }
    
    private function iniciaFormularioCalculadora() {
        echo '<form method="POST">
                  <table border="1" width="4" cellpadding="10" id="tabela_calculadora">
                      <tbody>';
    }
    
    private function criaCalculadora() {
        $this->criaVisor();
        $this->criaCampos(['1' => '1', '2' => '2', '3' => '3', 'mult' => 'X']);
        $this->criaCampos(['4' => '4', '5' => '5', '6' => '6', 'subt' => '-']);
        $this->criaCampos(['7' => '7', '8' => '8', '9' => '9', 'soma' => '+']);
        $this->criaCampos(['div' => '%', 'zero' => '0', 'limpar' => 'C', 'igual' => '=']);
    }
    
    private function criaVisor() {
        $iValor = isset($_SESSION['valor_visor']) ? $_SESSION['valor_visor'] : '';
        echo "<input id='visor' type='text' disabled value='{$iValor}'>";
    }
    
    private function criaCampos(array $aCampos) {
        echo '<tr>';
        foreach ($aCampos as $sKey => $sValue) {
            echo "<td><input type='submit' name='{$sKey}' value='{$sValue}'></td>"; 
        }
        echo '</tr>';
    }
    
    public function __destruct() {
        $this->terminaFormularioCalculadora();
    }
    
    private function terminaFormularioCalculadora() {
        echo '</tbody>
            </table>
        </form>';
    }
    
    
}
