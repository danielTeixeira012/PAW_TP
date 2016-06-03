<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilizador
 *
 * @author User
 */
class Utilizador {
    private $email;
    private $password;
    
    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

       public function convertObjectToArray(){
        $data = array(  'email' => $this->getEmail(), 
                        'password' => $this->getPassword());        
        return $data;
    }

}
