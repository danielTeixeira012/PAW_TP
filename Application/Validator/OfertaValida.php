<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$empregador = SessionManager::existSession('email');
$input = INPUT_POST;
        require_once '../Validator/OfertaValidator.php';
        if (count($errors) > 0) {
            header('Location: ../../empregador/AddOferta.php');
        } else {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            if ($empregador) {
                $ofertasMan = new OfertaManager();
                $empregadorMan = new EmpregadorManager();
                $idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
                $ofertas = $ofertasMan->getOfertaUser($idEmpregador);
                $managerEmpregador = new EmpregadorManager();
                $ofertasMan->insertOferta(new ofertaTrabalho('', $categoria, $titulo, $tipo, $informacao, $funcao, $salario, $requisitos, $regiao, $idEmpregador, $status, $dataLimite));
                ?>
                <h2>OFERTA SUBMETIDA</h2>
                <a href="index.php"><input type="submit" value="Pagina Inicial"></a> 
                <?php
            } else {
                require_once '../../login.php';
                ?>
                <h2>Inicie sessão para fazer uma oferta</h2>

                <?php
            }
        }
        ?>
    </body>
</html>
