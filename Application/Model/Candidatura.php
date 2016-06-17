<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Candidatura
 *
 * @author User
 */
class Candidatura {

    private $idCandidatura;
    private $idPrestador;
    private $idOferta;
    private $statusCandidatura;

    function __construct($idPrestador, $idOferta, $statusCandidatura) {
        $this->idPrestador = $idPrestador;
        $this->idOferta = $idOferta;
        $this->statusCandidatura = $statusCandidatura;
    }

    function getIdCandidatura() {
        return $this->idCandidatura;
    }

    function getIdPrestador() {
        return $this->idPrestador;
    }

    function getIdOferta() {
        return $this->idOferta;
    }

    function getStatusCandidatura() {
        return $this->statusCandidatura;
    }

    function setIdCandidatura($idCandidatura) {
        $this->idCandidatura = $idCandidatura;
    }

    function setIdPrestador($idPrestador) {
        $this->idPrestador = $idPrestador;
    }

    function setIdOferta($idOferta) {
        $this->idOferta = $idOferta;
    }

    function setStatusCandidatura($statusCandidatura) {
        $this->statusCandidatura = $statusCandidatura;
    }

    public function convertObjectToArray() {
        $data = array('idCandidatura' => '',
                       'idPrestador' => $this->getIdPrestador(),
                       'idOferta' => $this->getIdOferta(),
                       'statusCandidatura' => $this->getStatusCandidatura()
            );
        return $data;
    }

}
