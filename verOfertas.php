<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
$email = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
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
        <script src="Application/Libs/jquery-2.2.4.js"></script>
        <script src="Application/JS/PublicarJS.js"></script>
        <script src="Application/JS/candidatarJS.js"></script>   
    </head>
    <body>
        <?php
        $idOferta = filter_input(INPUT_GET, 'oferta');
        $man = new OfertaManager();
        $res = $man->getOfertaByID($idOferta);
        $prestadorMan = new PrestadorManager();
        $manEmpregador = new EmpregadorManager();
        if ($res != array()) {
            $pre = $manEmpregador->getEmpregadorByid($res[0]['idEmpregador']);
            ?>
            <article id="article" itemscope data-id="<?= $idOferta ?>">
                <h2>Titulo Oferta: <?= $res[0]['tituloOferta'] ?></h2>
                <p>Informação Oferta: <?= $res[0]['informacaoOferta'] ?></p>
                <p>Função Oferta: <?= $res[0]['funcaoOferta'] ?></p>
                <p>Salario: <?= $res[0]['salario'] ?></p>
                <p>Requisitos: <?= $res[0]['requisitos'] ?></p>
                <p>Regiao: <?= $res[0]['regiao'] ?></p>
                <p>Tipo Oferta: <?= $res[0]['tipoOferta'] ?></p>
                <p>Empregador: <?= $pre[0]['email'] ?></p>

                <?php
                if ($email && $tipo) {
                    if (SessionManager::getSessionValue('tipoUser') === 'prestador') {
                        $candMan = new CandidaturaManager();
                        $presMan = new PrestadorManager();
                        $returnPres = $presMan->verifyEmail(SessionManager::getSessionValue('email'));
                        $returnCand = $candMan->getCandidaturaByIdPrestadorAndStatusCandidaturasAndIdOferta($returnPres[0]['idPrestador'], 'submetida', $idOferta);
                        if (empty($returnCand)) {
                            ?>
                            <button id="candidatar">Candidatar</button>    
                            <?php
                        } else {
                            ?>
                            <p>Já se candidatou a esta oferta de trabalho</p>
                            <?php
                        }
                    } else if (SessionManager::getSessionValue('tipoUser') === 'empregador') {
                        //ver se é dele
                        $candidMan = new CandidaturaManager();
                        $logado = $manEmpregador->getEmpregadorByMail(SessionManager::getSessionValue('email'));
                        if ($res[0]['idEmpregador'] === $logado[0]['idEmpregador']) {
                            if ($res[0]['statusO'] === 'pendente') {
                                ?>
                                <button id="publicar">Publicar</button>  
                                <?php
                            } else if ($res[0]['statusO'] === 'publicada' || $res[0]['statusO'] === 'finalizada' || $res[0]['statusO'] === 'expirada') {
                                //publicada
                                $candidaturas = $candidMan->getCandidaturasSubmetidasByIdOferta($idOferta);
                                if (!empty($candidaturas)) {
                                    ?>
                                    <h1>Candidatos á oferta de trabalho</h1>
                                    <table>

                                        <th>Prestador</th> 


                                        <?php
                                        foreach ($candidaturas as $key => $value) {
                                            ?>

                                            <tr>
                                                <td><?= $value['idPrestador']; ?></td>
                                                <td><a href="empregador/VerHistoricoCandidato.php?prestador=<?= $value['idPrestador'] ?>">Ver prestador</a></td>

                                            </tr>
                                        <?php }
                                        ?>
                                    </table>
                                    <?php
                                } else {
                                    $candidaturasVence = $candidMan->getVencedorCandidaturaByIdOferta($idOferta);
                                    if (empty($candidaturasVence)) {
                                        ?>
                                        <p>Não foram efetuadas candidaturas para esta oferta</p>
                                        <?php
                                    } else {
                                        $idVencedor = $candidaturasVence[0]['idPrestador'];
                                        $prestadorVencedor = $prestadorMan->getPrestadorByid($idVencedor);
                                        ?>
                                        <h1>Vencedor da oferta</h1>     
                                        <table>
                                            <tr>
                                                <td><?= $prestadorVencedor[0]['nome'] ?></td>
                                                <td><a href="empregador/VerHistoricoCandidato.php?prestador=<?= $idVencedor ?>">Ver prestador</a></td>
                                            </tr>
                                        </table>
                                        <?php
                                        $candidaturasRejeitadas = $candidMan->getCandidaturasRejeitadaByIdOferta($idOferta);
                                        if (!empty($candidaturasRejeitadas)) {
                                            ?>

                                            <table>
                                                <h1>Candidatos Rejeitados</h1>
                                                <?php
                                                foreach ($candidaturasRejeitadas as $key => $value) {
                                                    ?>

                                                    <tr>
                                                        <td><?= $value['idPrestador']; ?></td>
                                                        <td><a href="empregador/VerHistoricoCandidato.php?prestador=<?= $value['idPrestador'] ?>">Ver prestador</a></td>

                                                    </tr>
                                                <?php }
                                                ?>
                                            </table>

                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
            </article>
            <?php
        } else {
            ?>
            <h2>Não existe nenhuma oferta com o id <?= $idOferta ?></h2>
            <?php
        }
        ?>
        <a href="index.php"><button>Voltar</button></a>
    </body>
</html>
