<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');

$ofertas = new OfertaManager();
$data = date("Y-m-d");
$publics = $ofertas->getOfertasPublicadas();
foreach ($publics as $key => $value) {
    if ($value['dataLimite'] <= $data) {
        $id = $value['idOferta'];
        $ofertasMan = new OfertaManager();
        $candidaturaMan = new CandidaturaManager();
        $oferta = $ofertasMan->getOfertaByID($id);
        $of = OfertaTrabalho::convertArrayToObject($oferta[0]);
        if(empty($candidaturaMan->getCandidaturasByIdOferta($id))){
           $of->setStatusO('expirada'); 
        }else{
        $of->setStatusO('finalizada');
        }
        $ofertasMan->editOferta($of, $id);
    }
}

