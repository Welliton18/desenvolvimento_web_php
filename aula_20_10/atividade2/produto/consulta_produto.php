<?php

namespace produto;

use Html,
    Persistencia;

class ConsultaProduto {
    
    /** @var Persistencia */
    private $Persistencia;

    public function criaTela(){
        $oHtml = new Html();
        $oHtml->criaBotaoIncluir();
        $oHtml->criaBotaoVoltar();
        echo '<table><tr>';
        $aResult = $this->getPersistencia()->getAllProdutos();
        if(empty($aResult)){
            echo 'Não existe nenhum registro nesta consulta';
        } else {
            foreach ($aResult[0] as $key => $value) {
                !is_numeric($key) ? $oHtml->criaColunaCabecalho($key) : true;
            }
            echo '</tr>';
            foreach ($aResult as $aLinha) {
                echo '<tr>';
                foreach ($aLinha as $sNome => $xValorLinha) {
                    !is_numeric($sNome) ? $oHtml->criaColuna($sNome, $xValorLinha) : true;
                }
                $iCodigo = $aLinha['Código'];
                $oHtml->criaBotaoAlterar($iCodigo);
                $oHtml->criaBotaoExcluir($iCodigo);
                echo '</tr>';
            }
            echo '</table>';
        }
    }
    
    private function getPersistencia() {
        if(!isset($this->Persistencia)){
            $this->Persistencia = new Persistencia();
        }
        return $this->Persistencia;
    }
    

}?>
    