<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statusOferta
 *
 * @author danielteixeira
 */
class statusOferta {
    private $statusO_id;
    private $nome;
    
    function __construct($statusO_id, $nome) {
        $this->statusO_id = $statusO_id;
        $this->nome = $nome;
    }
    
    function getStatusO_id() {
        return $this->statusO_id;
    }

    function getNome() {
        return $this->nome;
    }

    function setStatusO_id($statusO_id) {
        $this->statusO_id = $statusO_id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }



    
}
