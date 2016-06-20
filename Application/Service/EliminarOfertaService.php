<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$exist = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if($exist && $tipo){
    if(SessionManager::getSessionValue('tipoUser') === 'administrador'){
        $id = filter_input(INPUT_GET, 'idOferta');        
        $manCand = new CandidaturaManager();
        $manCand->deleteCandidaturaByIdOferta($id);
        $manOferta = new OfertaManager();
        $manOferta->deleteOfertasByIdOferta($id);
        echo 'Oferta eliminado';
    }else{
        echo '';
    }    
}