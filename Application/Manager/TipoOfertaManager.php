<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoOfertaManager
 *
 * @author danielteixeira
 */
class TipoOfertaManager extends MyDataAccessPDO{
    const SQL_TABLE_NAME = 'tipoOferta';
    
    function getTipoOfertas(){
        return $this->getRecords(self::SQL_TABLE_NAME);
    }
}
