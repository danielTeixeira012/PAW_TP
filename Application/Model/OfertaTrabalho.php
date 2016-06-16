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
    private $idOferta;
    private $idCategoria;
    private $tituloOferta;
    private $tipoOferta;
    private $informacaoOferta;
    private $funcaoOferta;
    private $salario;
    private $requisitos;
    private $regiao;
    private $idEmpregador;
    private $statusO;
    
    function __construct($idOferta, $idCategoria, $tituloOferta, $TipoOferta, $informacaoOferta, $funcaoOferta, $salario, $requisitos, $regiao, $idEmpregador, $statusO) {
        $this->idOferta = $idOferta;
        $this->idCategoria = $idCategoria;
        $this->tituloOferta = $tituloOferta;
        $this->tipoOferta = $TipoOferta;
        $this->informacaoOferta = $informacaoOferta;
        $this->funcaoOferta = $funcaoOferta;
        $this->salario = $salario;
        $this->requisitos = $requisitos;
        $this->regiao = $regiao;
        $this->idEmpregador = $idEmpregador;
        $this->statusO = $statusO;
    }
    
    function getIdOferta() {
        return $this->idOferta;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getTituloOferta() {
        return $this->tituloOferta;
    }

    function getTipoOferta() {
        return $this->tipoOferta;
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

    function getRegiao() {
        return $this->regiao;
    }

    function getIdEmpregador() {
        return $this->idEmpregador;
    }

    function getStatusO() {
        return $this->statusO;
    }

    function setIdOferta($idOferta) {
        $this->idOferta = $idOferta;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setTituloOferta($tituloOferta) {
        $this->tituloOferta = $tituloOferta;
    }

    function setTipoOferta($TipoOferta) {
        $this->tipoOferta = $TipoOferta;
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

    function setRegiao($regiao) {
        $this->regiao = $regiao;
    }

    function setIdEmpregador($idEmpregador) {
        $this->idEmpregador = $idEmpregador;
    }

    function setStatusO($statusO) {
        $this->statusO = $statusO;
    }

    
    
    
   
    
    public function convertObjectToArray(){
        $data = array(  'idOferta' => '', 
                        'idCategoria' => $this->getIdCategoria(), 
                        'tituloOferta' => $this->getTituloOferta(), 
                        'tipoOferta' => $this->getTipoOferta(), 
                        'informacaoOferta' => $this->getInformacaoOferta(), 
                        'funcaoOferta' => $this->getFuncaoOferta(), 
                        'salario' => $this->getSalario(), 
                        'requisitos' => $this->getRequisitos(), 
                        'regiao' => $this->getRegiao(), 
                        'idEmpregador' => $this->getIdEmpregador(), 
                        'statusO' => $this->getStatusO());        
        return $data;
    }
    
   
}


