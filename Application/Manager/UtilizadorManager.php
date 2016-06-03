<?php

    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Utilizador.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilizadorManager
 *
 * @author User
 */
class UtilizadorManager extends MyDataAccessPDO{
    
    const SQL_TABLE_NAME = 'utilizador';
    
    public function insertUtilizador(Utilizador $utilizador){
        parent::insert(self::SQL_TABLE_NAME, $utilizador->convertObjectToArray());
    }
}
