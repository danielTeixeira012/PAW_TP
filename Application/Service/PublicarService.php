<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationModelPath() . 'OfertaTrabalho.php');
$exist = SessionManager::existSession('email');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($exist){
    $id = filter_input(INPUT_GET, 'idOferta');
    $ofertasMan =  new OfertaManager();
    $oferta = $ofertasMan->getOfertaByID($id);
    $of = OfertaTrabalho::convertArrayToObject($oferta[0]);
    $of->setStatusO('publicada');
    $ofertasMan->publicarOferta($of,$id);
    echo 'Oferta Publicada';
}