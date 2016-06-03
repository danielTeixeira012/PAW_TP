<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empregador
 *
 * @author User
 */
class Empregador extends Utilizador{
    private $nome;
    private $contacto;
    private $morada;
    private $codigopostal;
    private $distrito;
    private $concelho;
    
    function __construct($email, $password, $nome, $contacto, $morada, $codigopostal, $distrito, $concelho) {
        parent::__construct($email, $password);
        $this->nome = $nome;
        $this->contacto = $contacto;
        $this->morada = $morada;
        $this->codigopostal = $codigopostal;
        $this->distrito = $distrito;
        $this->concelho = $concelho;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getMorada() {
        return $this->morada;
    }

    function getCodigopostal() {
        return $this->codigopostal;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getConcelho() {
        return $this->concelho;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setMorada($morada) {
        $this->morada = $morada;
    }

    function setCodigopostal($codigopostal) {
        $this->codigopostal = $codigopostal;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setConcelho($concelho) {
        $this->concelho = $concelho;
    }



}
