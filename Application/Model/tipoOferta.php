<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoOferta
 *
 * @author danielteixeira
 */
class tipoOferta {
    private $idTipoOferta;
    private $nome;
    
    function __construct($idTipoOferta, $nome) {
        $this->idTipoOferta = $idTipoOferta;
        $this->nome = $nome;
    }
    
    function getIdTipoOferta() {
        return $this->idTipoOferta;
    }

    function getNome() {
        return $this->nome;
    }

    function setIdTipoOferta($idTipoOferta) {
        $this->idTipoOferta = $idTipoOferta;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

}
