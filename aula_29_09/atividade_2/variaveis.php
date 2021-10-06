<?php
    session_start();
    $iPagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    $iRegistro  = isset($_POST['registro']) ? $_POST['registro'] : $_SESSION['registro'];
    $iColuna    = isset($_POST['colunas']) ? $_POST['colunas'] : $_SESSION['colunas'];
    $iRegPagina = isset($_POST['registroPagina']) ? $_POST['registroPagina'] : $_SESSION['registroPagina'];
    
    $_SESSION['registro']       = $iRegistro;
    $_SESSION['colunas']        = $iColuna;
    $_SESSION['registroPagina'] = $iRegPagina;

    if(!isset($_SESSION['array']) || !isset($_GET['pagina'])){
        for ($i=0; $i < round($iRegistro / $iColuna); $i++) { 
            for ($j=0; $j < $iColuna; $j++) { 
                $aMatriz[$i][$j] = rand(0, 100);
            }
        }
        $_SESSION['array'] = $aMatriz;
    }

    $iInicio = $iPagina == 1 ? 0 : $iPagina * $iRegPagina - $iRegPagina;
    $iFim    = ($iInicio + $iRegPagina) < $iRegistro / $iColuna ? $iInicio + $iRegPagina : $iRegistro / $iColuna;

    echo '<table>';
    for ($iInicio - 10; $iInicio < $iFim; $iInicio++) { 
        echo '<tr><td style="border:solid 1px">' . $iInicio . '</td>';
        for ($j=0; $j < $iColuna; $j++) { 
            echo '<td style="border:solid 1px">' . $_SESSION['array'][$iInicio][$j] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    for ($i=1; $i <= ceil($iRegistro / ($iRegPagina * $iColuna)); $i++) { 
        if($i != $iPagina){
            echo '<a href="?pagina='.$i.'" style="margin-right:5px"">'.$i.'</a>';
        }
    }
    
    echo '</form>';

