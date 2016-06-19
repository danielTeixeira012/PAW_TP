<?php 
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if($session && $tipo){
    if(SessionManager::getSessionValue('tipoUser') !== 'administrador'){
        header('location: ../index.php');
    }
}else{
    header('location: ../index.php');
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
        <a href=""><button>Ofertas</button></a>
        <a href="prestadoresServicosAdmin.php"><button>Prestadores de Serviços</button></a>
        <a href="empregadorAdmin.php"><button>Empregadores</button></a>
    </body>
</html>
