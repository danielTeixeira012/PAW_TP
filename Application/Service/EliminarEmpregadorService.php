<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
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
        $id = filter_input(INPUT_GET, 'idEmpregador');
        $manEmp = new EmpregadorManager();        
        $manOfer = new OfertaManager();
        $resOfer = $manOfer->getOfertaUser($id);
        if(!empty($resOfer)){
            $manCand = new CandidaturaManager();
            foreach ($resOfer as $key => $value) {
                $manCand->deleteCandidaturaByIdOferta($value['idOferta']);
            }
        }
        $manOfer->deleteOfertasByIdEmpregador($id);
        $manEmp->deleteEmpregadorById($id);
        echo 'Eliminado';
    }
}