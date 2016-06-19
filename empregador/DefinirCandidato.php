<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
$email = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
$idOferta = filter_input(INPUT_GET, 'oferta');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../Application/Libs/jquery-2.2.4.js"></script>
        <script src="../Application/JS/AceitarCandidaturaJS.js"></script>
    </head>
    <body>
        <section id="candidaturas">
            <table>
                <tr>
                    <th>Candidatura</th>
                    <th>Prestador</th> 
                    <th>Oferta</th>

                </tr>
                <?php
                $candidaturasMan = new CandidaturaManager();
                $empregadorMan = new EmpregadorManager();
                $candidaturas = $candidaturasMan->getCandidaturasSubmetidasByIdOferta($idOferta);


//                    $userEmail = SessionManager::getSessionValue('email');
//                    $id = $empregadorMan->getIdByMail($userEmail)[0]['idEmpregador'];
//                    $ofertas = $database->getOfertasPublicadasUser($id);


                foreach ($candidaturas as $key => $value) {
                    ?>
                    <tr data-idCandidatura="<?= $value['idCandidatura'] ?>" data-idOferta="<?= $value['idOferta'] ?>">

                        <td><?= $value['idCandidatura'] ?></td>
                        <td><?= $value['idPrestador'] ?></td>
                        <td><?= $value['idOferta'] ?></td>
                        
                        <td><a href="VerHistoricoCandidato.php?prestador=<?= $value['idPrestador']?>">Ver prestador</a></td>
                        <td><button class="aceitarButton" id="aceitarButton">Aceitar</button></td>
                        
                    </tr>

                    <?php
                }
                ?>

            </table>

        </section>
    </body>
</html>
