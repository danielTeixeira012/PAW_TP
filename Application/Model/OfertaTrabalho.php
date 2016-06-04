<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ofertaTrabalho
 * 
 * @author danielteixeira
 */
class ofertaTrabalho {
    private $codOferta;
    private $idCategoria;
    private $tituloOferta;
    private $idTipoOferta;
    private $informacaoOferta;
    private $funcaoOferta;
    private $salario;
    private $requisitos;
    private $regiao;
    private $idEmpregador;
    private $statusO_id;
     
    
    function __construct($codOferta, $idCategoria, $tituloOferta, $idTipoOferta, $informacaoOferta, $funcaoOferta, $salario, $requisitos, $regiao, $idEmpregador, $statusO_id) {
        $this->codOferta = $codOferta;
        $this->idCategoria = $idCategoria;
        $this->tituloOferta = $tituloOferta;
        $this->idTipoOferta = $idTipoOferta;
        $this->informacaoOferta = $informacaoOferta;
        $this->funcaoOferta = $funcaoOferta;
        $this->salario = $salario;
        $this->requisitos = $requisitos;
        $this->regiao = $regiao;
        $this->idEmpregador = $idEmpregador;
        $this->statusO_id = $statusO_id;
    }

    function getCodOferta() {
        return $this->codOferta;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getTituloOferta() {
        return $this->tituloOferta;
    }

    function getIdTipoOferta() {
        return $this->idTipoOferta;
    }

    function getInformacaoOferta() {
        return $this->informacaoOferta;
    }

    function getFuncaoOferta() {
        return $this->funcaoOferta;
    }

    function getSalario() {
        return $this->salario;
    }

    function getRequisitos() {
        return $this->requisitos;
    }

    function getIdEmpregador() {
        return $this->idEmpregador;
    }

    function getStatusO_id() {
        return $this->statusO_id;
    }

    function setCodOferta($codOferta) {
        $this->codOferta = $codOferta;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setTituloOferta($tituloOferta) {
        $this->tituloOferta = $tituloOferta;
    }

    function setIdTipoOferta($idTipoOferta) {
        $this->idTipoOferta = $idTipoOferta;
    }

    function setInformacaoOferta($informacaoOferta) {
        $this->informacaoOferta = $informacaoOferta;
    }

    function setFuncaoOferta($funcaoOferta) {
        $this->funcaoOferta = $funcaoOferta;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setRequisitos($requisitos) {
        $this->requisitos = $requisitos;
    }

    function setIdEmpregador($idEmpregador) {
        $this->idEmpregador = $idEmpregador;
    }

    function setStatusO_id($statusO_id) {
        $this->statusO_id = $statusO_id;
    }

    function getRegiao() {
        return $this->regiao;
    }

    function setRegiao($regiao) {
        $this->regiao = $regiao;
    }
    
    public function convertObjectToArray(){
        $data = array(  'codOferta' => $this->getCodOferta(), 
                        'idCategoria' => $this->getIdCategoria(), 
                        'tituloOferta' => $this->getTituloOferta(), 
                        'idTipoOferta' => $this->getIdTipoOferta(), 
                        'informacaoOferta' => $this->getInformacaoOferta(), 
                        'funcaoOferta' => $this->getFuncaoOferta(), 
                        'salario' => $this->getSalario(), 
                        'requisitos' => $this->getRequisitos(), 
                        'regiao' => $this->getRegiao(), 
                        'idEmpregador' => $this->getIdEmpregador(), 
                        'statusO_id' => $this->getStatusO_id());        
        return $data;
    }
    
   
}


