<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoriaOferta
 *
 * @author danielteixeira
 */
class categoriaOferta {
    private $idCategoria;
    private $nomeCategoria;
    
    function __construct($idCategoria, $nomeCategoria) {
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
    }
    
    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }

    
}
