<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$categoriaPesquisa = filter_input(INPUT_GET, 'categoria');

$ManagerOfertas = new OfertaManager();

$ManagerCategoria = new CategoriasManager();
$resultadosCategorias = $ManagerCategoria->getCategorias();

foreach ($resultadosCategorias as $key => $value) {
    if($value['nomeCategoria'] === $categoriaPesquisa){
        $resultado = $ManagerOfertas->getOfertasByCategoria($value['idCategoria']);
        echo json_encode($resultado);
    }
}

