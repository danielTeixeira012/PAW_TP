<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
$empregador = SessionManager::existSession('email');
$errors = array();
        $input = INPUT_POST;
        require_once 'OfertaValidator.php';
        if (count($errors) > 0) {
            $idOferta = filter_input(INPUT_POST, 'idOferta');
            header('Location: ../../empregador/OfertaEdit.php?altOfer='.$idOferta);
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
                    print_r($idOfertaAlt);
                    $ofertasMan->editOferta(new ofertaTrabalho($idOfertaAlt, $categoria, $titulo, $tipo, $informacao, $funcao, $salario, $requisitos, $regiao, $idEmpregador, $status), $idOfertaAlt);
                    $exist = true;
                }
            }
            if($exist === false){
               $errors['ofertaEdit'] = 'A oferta não foi editada'; 
               echo 'errou!!!!';
            }
        }
        ?>
    </body>
</html>
