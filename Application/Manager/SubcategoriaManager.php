<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubcategoriaOferta
 *
 * @author danielteixeira
 */
class SubcategoriaManager extends MyDataAccessPDO{
     const SQL_TABLE_NAME = 'subcategoriaOferta';
    
    function getCategorias(){
        return $this->getRecords(self::SQL_TABLE_NAME);
    }
    
    function getCategoriasByIdCategoria($idCategoria){
        return $this->getRecords(self::SQL_TABLE_NAME, array('idCategoria' => $idCategoria));
    }
}
