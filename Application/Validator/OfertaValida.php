<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
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
        $input = INPUT_POST;
        require_once '../Validator/OfertaValidator.php';
        if (count($errors) > 0) {
            require_once __DIR__ . '../../empregador/AddOferta.php';
        } else {
            
            if ($empregador) {
                $categoria = 1;
                $titulo = filter_input($input, 'tituloO');
                $tipo = "tipo1";
                $informacao = filter_input($input, 'infoO');
                $funcao = filter_input($input, 'funcO');
                $salario = filter_input($input, 'sal');
                $requisitos = filter_input($input, 'req');
                $regiao = filter_input($input, 'regi');
                $status = "so1";
                $managerEmpregador = new EmpregadorManager();
                $teste = $managerEmpregador->verifyEmail(SessionManager::getSessionValue('email'));
                $oferta = new ofertaTrabalho($categoria, $titulo, $tipo, $informacao, $funcao, $salario, $requisitos, $regiao, $teste[0]['idEmpregador'], $status);
                $manager = new OfertaManager();
                $manager->insertOferta($oferta);
                ?>
                <h2>OFERTA SUBMETIDA</h2>
                <a href="index.php"><input type="submit" value="Pagina Inicial"></a> 
                <?php 
                }else{
                    require_once '../../login.php';
                    ?>
                <h2>Inicie sessão para fazer uma oferta</h2>
                
                    <?php
                }
        }
    ?>
    </body>
</html>
