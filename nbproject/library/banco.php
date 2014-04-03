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
        $pdo = $this->connection('localhost', 'sisvenda', 'root', '');
        
        $filme = "Os Gonnies";
        $preco = 20;
        
        //faz cadastro do filme e preco
        $stmt  = $pdo->prepare("INSERT INTO produto (produto, preco) VALUES(:p, :pr)");
        $stmt->bindValue(':p', $filme);
        $stmt->bindValue(':pr', $preco);
        
        //verifica se ja esta cadastrado
        $verifica = $pdo->prepare("SELECT * FROM produto WHERE produto = :f");
        $verifica->bindValue(':f', $filme);
        $verifica->execute();
        
        if($verifica->rowCount() >= 1){
            //se já estiver cadastrado exibe mensagem de erro
            echo("Já existe um filme cadastrado com o nome de ".$filme);
        }
        else{
            $stmt->execute();
            //se não estiver cadastrado, executa o insert e mostra a mensagem de sucesso
            if($stmt->rowCount() > 0){
                echo("Cadastrado com sucesso!");
            }else{
                echo("Erro ao cadastrar, tente novamente");
            }
        }
    }
    
    public function atualizar($tabela, $id, $dados){
        $pdo = $this->connection('localhost', 'sisvenda', 'root', '');
        $sql = "UPDATE $tabela SET ";
        foreach ($dados as $i => $v):
            $sql .= $i." = ".$v.", ";
        endforeach;
        $sql = rtrim($sql, ',');
        $sql .= " WHERE id = 1";
        echo $sql;
    }
}
