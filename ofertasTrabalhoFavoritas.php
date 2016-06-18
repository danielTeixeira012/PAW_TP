<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if ($session && $tipo) {
    if (SessionManager::getSessionValue('tipoUser') !== 'prestador') {
        header('location: index.php');
    }
} else {
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
        <?php
        $man = new PrestadorManager();
        $res = $man->verifyEmail(SessionManager::getSessionValue('email'));
        $manCand = new CandidaturaManager();
        $cand = $manCand->getCandidaturaByIdPrestadorAndStatusCandidatura($res[0]['idPrestador'], 'favorita');

        foreach ($cand as $key => $value) {
            ?>
            <ul>
                <li>Id da oferta: <?=$value['idOferta']?><a href="verCandidatura.php?oferta=<?=$value['idOferta']?>">Ver Oferta de trabalho</a> <a href="removerFavoritos.php?oferta=<?=$value['idOferta']?>">Remover dos Favoritos</a></li>
            </ul>
            <?php
        }
        ?>
        <a href="areaPessoalPrestador.php"><button>Voltar</button></a>
    </body>
</html>
