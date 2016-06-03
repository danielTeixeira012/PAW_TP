<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');
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
        require_once __DIR__ . '/Application/Validator/RegistoPrestadorValidator.php';
        if (count($errors) > 0) {
            require_once __DIR__ . '/registo.php';
        } else {
            $email = filter_input(INPUT_POST, 'mailP');
            $password = filter_input(INPUT_POST, 'passP');
            $utilizador = new Utilizador($email, $password);
            $manager = new UtilizadorManager();
            $manager->insertUtilizador($utilizador);
            ?>
            <h2>UTILIZADOR ADD</h2>
            <p>Utilizador adicionado, Obrigado!</p>
            <a href="login.php"><input type="submit" value="Pagina Inicial"></a> 
            <?php
        }
        ?>
    </body>
</html>
