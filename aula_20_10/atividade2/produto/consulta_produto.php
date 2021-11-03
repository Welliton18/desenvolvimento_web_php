<?php

namespace produto;

use Html,
    Persistencia;

class ConsultaProduto {
    
    /** @var Persistencia */
    private $Persistencia;

    public function criaTela(){
        $this->criaBotaoIncluir();
        $oHtml = new Html();
        echo '<form method="post"><table><tr>';
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
    //            $iIdProduto = $aLinha['id'];
    //            echo "<td><input type='submit' name='alterarProduto_{$iIdProduto}' value='Alterar'></td>";
    //            echo "<td><input type='submit' name='excluirProduto_{$iIdProduto}' value='Excluir'></td>";
    //            echo '<td><button><a href="alterar_produto.php">Alterar</a></button></td>';
    //            echo '</tr>';
            }
            echo '</form>';
        }
    }
    
    private function criaBotaoIncluir() {
        echo '<form action="incluir_produto.php" method="POST">';
        echo '<input type="submit" name="incluir_produto" value="Incluir">';
        echo '</form>';
    }

    private function getPersistencia() {
        if(!isset($this->Persistencia)){
            $this->Persistencia = new Persistencia();
        }
        return $this->Persistencia;
    }
    

}?>
    