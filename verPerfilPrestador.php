<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
$session = SessionManager::existSession('email');
if(!$session){
    header('location: index.php');
}
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
            <label for="emailPrestador">Email</label><input readonly id="emailPrestador" type="email" name="emailPrestador" value="<?= $user[0]['email'] ?>">
            <label for="passPrestador">Password</label><input id="passPrestador" type="password" name="passPrestador" value="<?= $user[0]['password'] ?>">
            <label for="nomePrestador">Nome</label><input id="nomePrestador" type="text" name="nomePrestador" value="<?= $user[0]['nome'] ?>">
            <label for="contactoPrestador">Contacto</label><input id="contactoPrestador" type="tel" name="contactoPrestador" value="<?= $user[0]['contato'] ?>">
            <label for="moradaPrestador">Morada</label><input id="moradaPrestador" type="text" name="moradaPrestador" value="<?= $user[0]['morada'] ?>">
            <label for="codigopostalPrestador">Codigo-Postal</label><input id="codigopostalPrestador" type="text" name="codigopostalPrestador" value="<?= $user[0]['codPostal'] ?>">
            <label for="distritoPrestador">Distrito</label><input id="distritoPrestador" type="text" name="distritoPrestador" value="<?= $user[0]['distrito'] ?>">
            <label for="concelhoPrestador">Concelho</label><input id="concelhoPrestador" type="text" name="concelhoPrestador" value="<?= $user[0]['concelho'] ?>">
            <input type="submit" value="Guardar novos dados">
            </form>
            <a href="areaPessoalPrestador.php"><button>Voltar</button></a>
            <?php 
        }   
        ?>
    </body>
</html>
