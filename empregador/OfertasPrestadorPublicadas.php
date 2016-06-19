<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
$session = SessionManager::existSession('email');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <section id="ofertas">
                <table>
                    <tr>
                        <th>Titulo</th>
                        <th>Estado</th> 

                    </tr>
                    <?php
                    $database = new OfertaManager();
                    $empregadorMan = new EmpregadorManager();

                    $userEmail = SessionManager::getSessionValue('email');
                    $id = $empregadorMan->getIdByMail($userEmail)[0]['idEmpregador'];
                    $ofertas = $database->getOfertasPublicadasUser($id);


                    foreach ($ofertas as $key => $value) {
                        ?>
                        <tr id="<?=$value['idOferta']?>"> 

                            <td><?= $value['tituloOferta'] ?></td>
                            <td><?= $value['statusO'] ?></td>
                            <td><a href="../verOfertas.php?oferta=<?= $value['idOferta'] ?>">Ver</a></td>
                            <td><a href="OfertaEdit.php?altOfer=<?= $value['idOferta'] ?>">Editar</a></td>
                            <td><a href="verOferta.php?altOfer=<?= $value['idOferta'] ?>">Remover</a></td>
                        </tr>

                        <?php
                    }
                    ?>
                </table>
                <a href="AddOferta.php">Adicionar novas Ofertas</a>
            </section>
    </body>
</html>
