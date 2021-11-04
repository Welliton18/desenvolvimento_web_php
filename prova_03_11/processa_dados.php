<?php

class processaDados {
    
    public function __construct() {
        $this->processaDados();
    }
    
    private function processaDados() {
        foreach ($_POST as $sKey => $sValue) {
            if(!$this->isNumero($sValue) && (!isset($_SESSION['valor_visor']) || is_null($_SESSION['valor_visor']))){
                    return;
                }
            if(isset($_SESSION['reset']) && $_SESSION['reset']){
                $this->isNumero($sValue) ? $_SESSION['valor_visor'] = null : true;
                $this->isNumero($sValue) ? $_SESSION['valor1'] = null : true;
                $_SESSION['reset'] = false;
            } 
            if($sKey == 'limpar'){
                $_SESSION['valor_visor'] = null;
                $_SESSION['operador'] = null;
            } else if($sKey === 'igual'){
                $this->calcula();
            } else {
                isset($_SESSION['valor_visor']) ? $_SESSION['valor_visor'] .= $sValue : $_SESSION['valor_visor'] = $sValue;
                if(!$this->isNumero($sValue)){
                    $_SESSION['operador'] = $sValue;
                } else if(!isset($_SESSION['operador']) || is_null($_SESSION['operador'])){
                    $_SESSION['valor1'] = $_SESSION['valor_visor'];
                } else {
                    isset($_SESSION['valor2'])? $_SESSION['valor2'].= $sValue : $_SESSION['valor2'] = $sValue;
                }
            }
        }
    }
    
    private function calcula() {
        switch (true) {
            case $_SESSION['operador'] === '+':
                $_SESSION['valor_visor'] = $_SESSION['valor1'] + $_SESSION['valor2'] ;
                break;
            case $_SESSION['operador'] === '-':
                $_SESSION['valor_visor'] = $_SESSION['valor1'] - $_SESSION['valor2'] ;
                break;
            case $_SESSION['operador'] === 'X':
                $_SESSION['valor_visor'] = $_SESSION['valor1'] * $_SESSION['valor2'] ;
                break;
            case $_SESSION['operador'] === '%':
                $_SESSION['valor_visor'] = $_SESSION['valor1'] / $_SESSION['valor2'] ;
                break;
        }
        $_SESSION['valor1'] = $_SESSION['valor_visor'];
        $_SESSION['reset'] = true;
        $_SESSION['operador'] = null;
        $_SESSION['valor2'] = null;
    }
    
    private function isNumero($iNumero) {
        $aNumeros = ['zero', 1, 2, 3, 4, 5, 6, 7, 8, 9];
        return in_array($iNumero, $aNumeros);
    }

    public function __destruct() {
        header('Location: index.php');
    }
    
}
