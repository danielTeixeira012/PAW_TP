<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$empregador = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once __DIR__ . '/../Validator/OfertaValidator.php';
        if (count($errorsO) > 0) {
            require_once __DIR__ . '/../../empregador/AddOferta.php';
        } else {
            if ($empregador && $tipo) {
                if (SessionManager::getSessionValue('tipoUser') === 'empregador') {
                    $ofertasMan = new OfertaManager();
                    $empregadorMan = new EmpregadorManager();
                    $idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
                    $ofertas = $ofertasMan->getOfertaUser($idEmpregador);
                    $managerEmpregador = new EmpregadorManager();
                    $data = date("Y-m-d");
                    if ($data < $dataLimite) {
                        $ofertasMan->insertOferta(new ofertaTrabalho('', $categoria, $titulo, $tipo, $informacao, $funcao, $salario, $requisitos, $regiao, $idEmpregador, $status, $dataLimite));
                        ?>
                        <h2>OFERTA SUBMETIDA</h2>
                        <a href="../../index.php"><input type="submit" value="Pagina Inicial"></a> 
                        <?php
                    } else {
                        ?>
                        <p>Data limite menor que data atual, troque por favor</p>
                        <?php
                    }
                }
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
