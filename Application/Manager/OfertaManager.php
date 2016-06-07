<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
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
class OfertaManager extends MyDataAccessPDO{
    const SQL_TABLE_NAME = 'ofertaTrabalho';
    
    function getOfertas(){
        return $this->getRecords(self::SQL_TABLE_NAME);
    }
    public function insertOferta(ofertaTrabalho $oferta){
        parent::insert(self::SQL_TABLE_NAME, $oferta->convertObjectToArray());
    }
    
    
}