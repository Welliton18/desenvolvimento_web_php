<?php

    namespace conexao;

    use \PDO;

class Conexao {

    public function getSql(){
        try {
            $oConn = new PDO('mysql:host=localhost;dbname=aula_06_10', 'root', '');
            $oConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOExcption $e) {
            echo 'Error' . $e->getMessage();
        }

        return $oConn;
    }

}
