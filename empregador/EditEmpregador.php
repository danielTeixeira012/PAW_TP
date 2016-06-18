<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');

$session = SessionManager::existSession('email');
$empregadorMan = new EmpregadorManager();
$empregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Application/styles/addOfertaCSS.css"/>
        <title></title>
    </head>
    <body>
        <form id="formEmpregador" action="../Application/Validator/EmpregadorEdita.php" method="post">     
            <label for="emailE">Email</label><input readonly id="emailE" type="email" name="emailE" value="<?= $empregador['email'] ?>">
            <label for="nomeE">Nome</label><input id="nomeE" type="text" name="nomeE" value="<?= $empregador['nome'] ?>">
            <label for="fotografiaE">Fotografia</label><input id="fotografiaE" type="file" name="fotografiaE" value="<?= fopen($empregador['fotoPath'], 'R+') ?>">
            <label for="passE">Password</label><input id="passE" type="password" name="passE" value="<?= $empregador['password'] ?>">
            <label for="contactoE">Contacto</label><input id="contactoE" type="tel" name="contactoE" value="<?= $empregador['contato'] ?>">
            <label for="moradaE">Morada</label><input id="moradaE" type="text" name="moradaE" value="<?= $empregador['morada'] ?>">
            <label for="codigopostalE">Codigo-Postal</label><input id="codigopostalE" type="text" name="codigopostalE" value="<?= $empregador['codPostal'] ?>">
            <label for="distritoE">Distrito</label><input id="distritoE" type="text" name="distritoE" value="<?= $empregador['distrito'] ?>">
            <label for="concelhoE">Concelho</label><input id="concelhoE" type="text" name="concelhoE" value="<?= $empregador['concelho'] ?>">
            <input id="confirmE" type="submit" value="Edit User">
            </form>
            
        </form>
        
        
        
    </body>
</html>
