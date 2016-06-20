<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if ($session && $tipo) {
    if (SessionManager::getSessionValue('tipoUser') !== 'administrador') {
        header('location: ../index.php');
    }
} else {
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
        <script src="../Application/Libs/jquery-2.2.4.js"></script>
        <script src="../Application/JS/adminOfertasJS.js"></script>
    </head>
    <body>
        <?php
        $manOfer = new OfertaManager();
        $res = $manOfer->getOfertas();
        ?>
        <table id="tableOfertas" border="1">
            <legend>Lista Ofertas</legend>
            <th> Titulo </th>
            <th> Estado </th>
            <th> Tipo </th>
            <th> Data Limite</th>
            <th> Opcao</th>
            <?php
            foreach ($res as $key => $value) {
                ?>
                <tr id="<?=$value['idOferta']?>">
                    <td><?= $value['tituloOferta'] ?></td>
                    <td><?= $value['statusO'] ?></td>
                    <td><?= $value['tipoOferta'] ?></td>
                    <td><?= $value['dataLimite'] ?></td>
                    <td><input class="eliminarOferta" type="button" value="Eliminar"><input class="opcao" type="button" value="<?=($value['statusO'] === 'desativada') ? 'Ativar' :'Desativar' ?>"></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
