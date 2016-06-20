<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if($session && $tipo){
    if(SessionManager::getSessionValue('tipoUser') !== 'prestador'){
        header('location: index.php');
    }
}else{
    header('location: index.php');
}
$prestadorMan =  new PrestadorManager();
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
        <link  rel="stylesheet" type="text/css" href="Application/styles/AreaPessoal.css">

        <title></title>
    </head>
    <body>      
        <?php require_once 'Application/imports/empregadorHeader.php';?>

        <section id="categorias">
            <?php

           $prest = PrestadorServico::convertArrayToObject($prestadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]);
            ?>
            <!--Adicionar Imagem -->
            <img id="fotoPerfil" src="Application/Resources/icons/Principal-01-256 RED.png" >
            <p><b>Nome:</b> <?= $prest->getNome() ?></p>
            <p><b>Email:</b> <?= $prest->getEmail() ?></p>
            <p><b>Contato:</b> <?= $prest->getContato() ?></p>
            <p><b>Morada:</b> <?= $prest->getMorada() ?></p>
            <p><b>Código Postal:</b> <?= $prest->getCodPostal() ?></p>
            <p><b>Distrito:</b> <?= $prest->getDistrito() ?></p>
            <p><b>Concelho:</b> <?= $prest->getConcelho() ?></p>
            <a class="button" id="editarButton" href="verPerfilPrestador.php">Editar dados...</a>
        </section>
        <section id="opcoes">
            <a href="ofertasTrabalhoFavoritas.php">
                <article>
                    <img src="Application/Resources/icons/Add-256.png">
                    <p>Ofertas Favoritas</p>
                </article></a>
            <a href="ofertasTrabalhoSubmetidas.php"><article>
                    <img src="Application/Resources/icons/Add-256.png">
                    <p>Ofertas Submetidas</p>
                </article></a>
            <p>Ofertas de Trabalho Finalizadas</p>
        </section>
        <a href="index.php"><button>Voltar</button></a>
    </body>
</html>
