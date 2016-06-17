<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationModelPath() . 'Candidatura.php');

$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if($session && $tipo){
    if(SessionManager::getSessionValue('tipoUser') !== 'prestador'){
        header('location: index.php');
    }
}else{
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
        <title></title>
    </head>
    <body>
        <?php
            $id = filter_input(INPUT_GET, 'oferta');
            $ManagerOferta = new OfertaManager();
            $res = $ManagerOferta->getOfertaByID($id);
            $ManagerPrestador = new PrestadorManager();
            $resPrest = $ManagerPrestador->verifyEmail(SessionManager::getSessionValue('email'));
            $candidatura = new Candidatura($resPrest[0]['idPrestador'], $id, 'favorita');
            $ManagerCandidatura = new CandidaturaManager();
            $results = $ManagerCandidatura->getCandidaturasByIdPrestador($resPrest[0]['idPrestador']);
            $count = 0;
            if($results !== array()){
                foreach ($results as $key => $value) {
                    if($value['idOferta'] !== $id){
                        $count++;
                    }
                }
            }else{
                $ManagerCandidatura->insertCandidatura($candidatura);
                
            }
            if($count === count($results)){
                $ManagerCandidatura->insertCandidatura($candidatura);
                ?>
                    <h2>Candidatura adicionada aos favoritos</h2>
                <?php
            }else{
                ?>
                    <h2>A candidatura já existe nos favoritos</h2>
                <?php
            }
        ?>
    </body>
</html>
