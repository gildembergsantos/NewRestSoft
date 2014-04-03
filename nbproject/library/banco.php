<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banco
 *
 * @author Gildemberg
 */
class banco {
    //put your code here
    public function banco(){
        
    }
    
    private function connection($host, $dando, $usuario, $senha){
        try {
            $con = new PDO("mysql:host=$host;dbname=$dando;", "$usuario", "$senha");
        } catch (PDOException $ex) {
            echo 'Erro encontrado '.$ex->getMessage().' com o código #'.$ex->getCode();
        }
        return $con;
    }

    public function adicionar($dados, $tabelas){
        //$con = new PDO("mysql:host=localhost;dbname=sisvenda;", "root", "");
        $pdo = $this->connection('localhost0', 'sisvenda', 'root', '');
        $sql = "INSERT INTO produto (produto, preco) VALUES(:p, :pr)";
        $stmt  = $pdo->prepare($sql);
        $stmt->bindValue(':p', 'Os Gonnies');
        $stmt->bindValue('pr', 20);
    }
}
