<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CandidaturaManager
 *
 * @author User
 */
class CandidaturaManager extends MyDataAccessPDO{
    const SQL_TABLE_NAME = 'candidatura';
    
    function insertCandidatura(Candidatura $candidatura){
        parent::insert(self::SQL_TABLE_NAME, $candidatura->convertObjectToArray());
    }
    
    function getCandidaturas(){
        return parent::getRecords(self::SQL_TABLE_NAME);
    }
    
    function getCandidaturasByIdPrestador($id){
        return parent::getRecords(self::SQL_TABLE_NAME, array('idPrestador' => $id));
    }
    
    function deleteCandidatura($id){
        parent::delete(self::SQL_TABLE_NAME, array('idCandidatura' => $id));
    }
    
    function getCandidaturaByIdPrestadorAndStatusCandidatura($id, $status){
        return parent::getRecords(self::SQL_TABLE_NAME, array('idPrestador' => $id, 'statusCandidatura' => $status));
    }
    
    function getCandidaturaByIdPrestadorAndStatusCandidaturasAndIdOferta($idPrestador, $status,$idOferta){
        return parent::getRecords(self::SQL_TABLE_NAME, array('idPrestador' => $idPrestador, 'statusCandidatura' => $status, 'idOferta' =>$idOferta));
    }
}
