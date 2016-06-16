<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
$session = SessionManager::existSession('email');
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
        <title>Ver Perfil</title>
        <link rel="stylesheet"  href="Application/styles/verPerfilCSS.css">
    </head>
    <body>
        <?php
        if ($session) {
            $mail = SessionManager::getSessionValue('email');
            $manager = new PrestadorManager();
            $user = $manager->verifyEmail($mail);
            ?>
            <form>
            <h2>Perfil do Prestador Serviço <?= SessionManager::getSessionValue('email') ?></h2>
            <img src="<?=$user[0]['fotoPath']?>" alt="Erro" height="150px" width="150px">
            <label for="emailE">Email</label><input readonly id="emailE" type="email" name="emailE" value="<?= $user[0]['email'] ?>">
            <label for="passE">Password</label><input id="passE" type="password" name="passE" value="<?= $user[0]['password'] ?>">
            <label for="nomeE">Nome</label><input id="nomeE" type="text" name="nomeE" value="<?= $user[0]['nome'] ?>">
            <label for="contactoE">Contacto</label><input id="contactoE" type="tel" name="contactoE" value="<?= $user[0]['contato'] ?>">
            <label for="moradaE">Morada</label><input id="moradaE" type="text" name="moradaE" value="<?= $user[0]['morada'] ?>">
            <label for="codigopostalE">Codigo-Postal</label><input id="codigopostalE" type="text" name="codigopostalE" value="<?= $user[0]['codPostal'] ?>">
            <label for="distritoE">Distrito</label><input id="distritoE" type="text" name="distritoE" value="<?= $user[0]['distrito'] ?>">
            <label for="concelhoE">Concelho</label><input id="concelhoE" type="text" name="concelhoE" value="<?= $user[0]['concelho'] ?>">
            <input type="submit" value="Guardar novos dados">
                
            </form>
                <?php 
        }   
        ?>
    </body>
</html>
