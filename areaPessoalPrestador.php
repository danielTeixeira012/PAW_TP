<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if($session && $tipo){
    if(SessionManager::getSessionValue('tipoUser') !== 'prestador'){
        header('location: index.php');
    }
}else{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Area Pessoal do Prestador <?=SessionManager::getSessionValue('email')?></h2>
        <ul>
            <li><a href="verPerfilPrestador.php">Ver Perfil</a></li>
            <li><a href="ofertasTrabalhoFavoritas.php">Ofertas de Trabalho Favoritas</a></li>
            <li><a href="ofertasTrabalhoSubmetidas.php">Ofertas de Trabalho Submetidas</a></li>
            <li>Ofertas de Trabalho Finalizadas</li>
        </ul>
        <a href="index.php"><button>Voltar</button></a>
    </body>
</html>
