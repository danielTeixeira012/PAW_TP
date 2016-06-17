<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
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
        <title>Registo</title>
    </head>
    <body>
        <?php
        require_once __DIR__ . '/Application/Validator/registoEmpregadorValidator.php';
        require_once __DIR__ . '/Application/Validator/upload_1.php';
        if (count($errorsE) > 0 && count($imgErrors)) {
            require_once __DIR__ . '/registo.php';
        } else {
            $email = filter_input(INPUT_POST, 'emailE');
            $password = filter_input(INPUT_POST, 'passE');
            $nome = filter_input(INPUT_POST, 'nomeE');
            $contato = filter_input(INPUT_POST, 'contactoE');
            $morada = filter_input(INPUT_POST, 'moradaE');
            $codPostal = filter_input(INPUT_POST, 'codigopostalE');
            $distrito = filter_input(INPUT_POST, 'distritoE');
            $concelho = filter_input(INPUT_POST, 'concelhoE');
            $empregador = new Empregador('',$email, 'target' , $password, $nome, $contato, $morada, $codPostal, $distrito, $concelho);
            $manager = new EmpregadorManager();
            $manager->insertPrestadorServico($empregador);
            ?>
            <h2>Empregador Adicionado</h2>
            <p>O Empregador foi adicionado, Obrigado!</p>
            <a href="login.php"><input type="submit" value="Pagina Inicial"></a> 
            <?php
        }
        ?>
    </body>
</html>
