<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
$empregador = SessionManager::existSession('email');
$idOferta = filter_input(INPUT_GET, 'altOfer');
$errors = array();
        $input = INPUT_POST;
        require_once __DIR__.'/../Application/Validator/OfertaValidator.php';
        
        if (count($errorsO) > 0) {
            $idOferta = filter_input(INPUT_POST, 'idOferta');
            require_once __DIR__ . '/OfertaEdit.php';
        } else {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $exist = false;
            $ofertasMan = new OfertaManager();
            $empregadorMan = new EmpregadorManager();
            $idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
            $ofertas = $ofertasMan->getOfertaUser($idEmpregador);
            $idOfertaAlt = filter_input(INPUT_POST, 'idOferta');
            
            foreach ($ofertas as $key => $value) {
                if ($value['idOferta'] === $idOfertaAlt) {
                    $ofertasMan->editOferta(new ofertaTrabalho($idOfertaAlt, $categoria, $titulo, $tipo, $informacao, $funcao, $salario, $requisitos, $regiao, $idEmpregador, $status,$dataLimite), $idOfertaAlt);
                    $exist = true;
                }
            }
        }
        ?>
    </body>
</html>
