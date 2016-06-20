<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');

$session = SessionManager::existSession('email');
$empregadorMan = new EmpregadorManager();
$empregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0];

$tipo = SessionManager::existSession('tipoUser');
if($session && $tipo){
    if(SessionManager::getSessionValue('tipoUser') !== 'empregador'){
        header('location: ../index.php');
    }
}else{
    header('location: ../index.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Application/styles/addOfertaCSS.css"/>
        <title></title>
    </head>
    <body>
        <?php
             require_once __DIR__ . '/../Application/Validator/EmpregadorValidators/EditaEmpregadorValidator.php';
        ?>
        <form id="formEmpregador" action="../Application/Validator/EmpregadorEdita.php" method="post">
            <img src="../<?= $empregador['fotoPath']?>">
            
            <label for="emailE">Email</label><input readonly id="emailE" type="email" name="emailE" value="<?= $empregador['email'] ?>">
            <label for="nomeE">Nome</label><input id="nomeE" type="text" name="nomeE" value="<?= $empregador['nome'] ?>"><?= isset($errorsE) && array_key_exists('nomeE', $errorsE) ? $errorsE['nomeE'] : '' ?>
            <label for="passE">Password</label><input id="passE" type="password" name="passE" value="<?= $empregador['password'] ?>"><?= isset($errorsE) && array_key_exists('passE', $errorsE) ? $errorsE['passE'] : '' ?>
            <label for="contactoE">Contacto</label><input id="contactoE" type="tel" name="contactoE" value="<?= $empregador['contato'] ?>"><?= isset($errorsE) && array_key_exists('contactoE', $errorsE) ? $errorsE['contactoE'] : '' ?>
            <label for="moradaE">Morada</label><input id="moradaE" type="text" name="moradaE" value="<?= $empregador['morada'] ?>"><?= isset($errorsE) && array_key_exists('moradaE', $errorsE) ? $errorsE['moradaE'] : '' ?>
            <label for="codigopostalE">Codigo-Postal</label><input id="codigopostalE" type="text" name="codigopostalE" value="<?= $empregador['codPostal'] ?>"><?= isset($errorsE) && array_key_exists('codigopostalE', $errorsE) ? $errorsE['codigopostalE'] : '' ?>
            <label for="distritoE">Distrito</label><input id="distritoE" type="text" name="distritoE" value="<?= $empregador['distrito'] ?>"><?= isset($errorsE) && array_key_exists('distritoE', $errorsE) ? $errorsE['distritoE'] : '' ?>
            <label for="concelhoE">Concelho</label><input id="concelhoE" type="text" name="concelhoE" value="<?= $empregador['concelho'] ?>"><?= isset($errorsE) && array_key_exists('concelhoE', $errorsE) ? $errorsE['concelhoE'] : '' ?>
            <input id="confirmE" type="submit" value="Edit User">
            </form>
            
        </form>
        
        
        
    </body>
</html>
