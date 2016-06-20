<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'OfertaTrabalho.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OfertaManager
 *
 * @author danielteixeira
 */
class OfertaManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'ofertaTrabalho';

    function getOfertas() {
        return $this->getRecords(self::SQL_TABLE_NAME);
    }

    function getOfertaUser($userId) {
        return $this->getRecords(self::SQL_TABLE_NAME, array('idEmpregador' => $userId));
    }

    function getOfertaByID($IdOferta) {
        return $this->getRecords(self::SQL_TABLE_NAME, array('idOferta' => $IdOferta));
    }

    function getOfertasPendentes() {
        return $this->getRecords(self::SQL_TABLE_NAME, array('statusO' => 'pendente'));
    }

    function getOfertasPendentesUser($userId) {
        return $this->getRecords(self::SQL_TABLE_NAME, array('statusO' => 'pendente', 'idEmpregador' => $userId));
    }

    function getOfertasFinalizadasUser($userId) {
        return $this->getRecords(self::SQL_TABLE_NAME, array('statusO' => 'finalizada', 'idEmpregador' => $userId));
    }

    function getOfertasExpiradasUser($userId) {
        return $this->getRecords(self::SQL_TABLE_NAME, array('statusO' => 'expirada', 'idEmpregador' => $userId));
    }

    function getOfertasPublicadas() {
        return $this->getRecords(self::SQL_TABLE_NAME, array('statusO' => 'publicada'));
    }

    function getOfertasPublicadasUser($userId) {
        return $this->getRecords(self::SQL_TABLE_NAME, array('statusO' => 'publicada', 'idEmpregador' => $userId));
    }

    public function editOferta(OfertaTrabalho $obj, $idOferta) {
        $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArrayUpdate(), array('idOferta' => $idOferta));
    }

    public function insertOferta(OfertaTrabalho $oferta) {
        parent::insert(self::SQL_TABLE_NAME, $oferta->convertObjectToArray());
    }

    function getOfertasByCategoria($categoria) {
        return parent::getRecords(self::SQL_TABLE_NAME, array('idCategoria' => $categoria));
    }

    public function deleteOfertasByIdEmpregador($idEmpregador) {
        return parent::delete(self::SQL_TABLE_NAME, array('idEmpregador' => $idEmpregador));
    }

    public function deleteOfertasByIdOferta($idOferta) {
        parent::delete(self::SQL_TABLE_NAME, array('idOferta' => $idOferta));
    }
    
    

}
