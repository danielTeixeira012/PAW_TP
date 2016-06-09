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
class Empregador{
    private $idEmpregador;
    private $email;
    private $password;
    private $nome;
    private $contato;
    private $morada;
    private $codPostal;
    private $distrito;
    private $concelho;
    
    function __construct($email, $password, $nome, $contato, $morada, $codPostal, $distrito, $concelho) {
        $this->email = $email;
        $this->password = $password;
        $this->nome = $nome;
        $this->contato = $contato;
        $this->morada = $morada;
        $this->codPostal = $codPostal;
        $this->distrito = $distrito;
        $this->concelho = $concelho;
    }

    function getIdEmpregador() {
        return $this->idEmpregador;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getNome() {
        return $this->nome;
    }

    function getContato() {
        return $this->contato;
    }

    function getMorada() {
        return $this->morada;
    }

    function getCodPostal() {
        return $this->codPostal;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getConcelho() {
        return $this->concelho;
    }

    function setIdEmpregador($idEmpregador) {
        $this->idEmpregador = $idEmpregador;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

    function setMorada($morada) {
        $this->morada = $morada;
    }

    function setCodPostal($codPostal) {
        $this->codPostal = $codPostal;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setConcelho($concelho) {
        $this->concelho = $concelho;
    }

        
    
        public function convertObjectToArray(){
        $data = array(  'idEmpregador' => '', 
                        'email' => $this->getEmail(),
                        'password' =>$this->getPassword(),
                        'nome' => $this->getNome(),
                        'contato' => $this->getContato(),
                        'morada' =>  $this->getMorada(),
                        'codPostal' =>  $this->getCodPostal(),
                        'distrito' => $this->getDistrito(),
                        'concelho' => $this->getConcelho()
            );        
        return $data;
    } 
    
    
}
