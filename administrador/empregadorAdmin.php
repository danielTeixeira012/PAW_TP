<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
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
        <script src="../Application/JS/eliminarEmpregadorJS.js"></script>
    </head>
    <body>
        <?php
        $managerEmpre = new EmpregadorManager();
        $res = $managerEmpre->getEmpregadores();
        ?>
        <table id="tableEmpregador" border="1">
            <legend>Lista de Empregadores</legend>
            <th> Nome </th>
            <th> Email </th>
            <th> Opcao </th>
            <?php
            foreach ($res as $key => $value) {
                ?>
                <tr id="<?= $value['idEmpregador'] ?>">
                    <td><?= $value['nome'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><button class="eliminarEmpregador">Eliminar</button></td>
                </tr>
                <?php
            }
            ?>
    </body>
</html>
