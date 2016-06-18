<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');
use Config as Conf;
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$empregador = SessionManager::existSession('email');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once __DIR__ . '/EmpregadorValidators/EditaEmpregadorValidator.php';
        if (count($errorsE) > 0 ) {
            print_r($errorsE);
            echo 'erros';
        } else {
            $empregadorMan = new EmpregadorManager();
            $idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
            $email = filter_input(INPUT_POST, 'emailE');
            $fotoPath = filter_input(INPUT_POST, 'fotografiaE');
            $password = filter_input(INPUT_POST, 'passE');
            $nome = filter_input(INPUT_POST, 'nomeE');
            $contato = filter_input(INPUT_POST, 'contactoE');
            $morada = filter_input(INPUT_POST, 'moradaE');
            $codPostal = filter_input(INPUT_POST, 'codigopostalE');
            $distrito = filter_input(INPUT_POST, 'distritoE');
            $concelho = filter_input(INPUT_POST, 'concelhoE');
        $prestadorMan = new EmpregadorManager();
        $prestadorMan->updateEmpregador(new Empregador($idEmpregador , $email, $fotoPath , $password, $nome, $contato, $morada, $codPostal, $distrito, $concelho),$idEmpregador);
        }
        ?>
        </body>
</html>
