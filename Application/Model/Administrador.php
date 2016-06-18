<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author User
 */
class Administrador {
    private $idAdministrador;
    private $email;
    private $password;
    
    
    function __construct($idAdministrador, $email, $password) {
        $this->idAdministrador = $idAdministrador;
        $this->email = $email;
        $this->password = $password;
    }
    
    function getIdAdministrador() {
        return $this->idAdministrador;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    
}
