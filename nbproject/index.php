<?php
include 'library/banco.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $db = new banco();
        $db->atualizar('produto', '1', array('produto' => 'Teste', 'preco' => 20))
        ?>
    </body>
</html>
