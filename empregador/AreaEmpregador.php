<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if ($session && $tipo) {
    if (SessionManager::getSessionValue('tipoUser') !== 'empregador') {
        header('location: ../index.php');
    }
} else {
    header('location: ../index.php');
}
$empregadorMan = new EmpregadorManager();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link  rel="stylesheet" type="text/css" href="../Application/styles/AreaPessoal.css">
    </head>
    <body>

         <?php require_once '../Application/imports/empregadorHeader.php'?>

        <section id="categorias">
            <?php
            $empreg = Empregador::convertArrayToObject($empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]);
            ?>
            <!--Adicionar Imagem -->
            <img id="fotoPerfil" src="../<?= $empreg->getFotoPath() ?>" alt="Erro">
            <p><b>Nome:</b> <?= $empreg->getNome() ?></p>
            <p><b>Email:</b> <?= $empreg->getEmail() ?></p>
            <p><b>Contato:</b> <?= $empreg->getContato() ?></p>
            <p><b>Morada:</b> <?= $empreg->getMorada() ?></p>
            <p><b>Código Postal:</b> <?= $empreg->getCodPostal() ?></p>
            <p><b>Concelho:</b><?= $empreg->getConcelho() ?></p>
            <p><b>Distrito:</b> <?= $empreg->getDistrito() ?></p>
            <a class="button" id="editarButton" href="EditEmpregador.php">Editar dados...</a>
        </section>


        <section id="opcoes">

            <a href="AddOferta.php">
                <article>
                    
                    <img src="../Application/Resources/icons/Add-256.png">
                    <p>Adicionar Oferta</p>
                </article>
            </a>
            <a href="OfertasPrestadorPendentes.php">
                <article>
                    
                    <img src="../Application/Resources/icons/Add-Earth-256.png">
                    <p>Ofertas Pendentes</p>
                </article>
            </a>
            <a href="OfertasPrestadorPublicadas.php">
            <article>
               
                <img src="../Application/Resources/icons/Earth-Node-256.png">
                 <p>Ofertas Publicadas</p>
            </article>
                <a href="OfertasPrestadorFinalizadas.php">
            <article>
                
                <img src="../Application/Resources/icons/User-Earth-256.png">
                <p>Ofertas Finalizadas</p>
            </article>
                </a>
                <a href="OfertasPrestadorExpiradas.php">
            <article>
                
                <img src="../Application/Resources/icons/Lock-Earth-256.png">
                <p>Ofertas Expiradas</p>
            </article>
                </a>
        </section>




        <footer id="foot">
            <p>&copy;2016 - Desenvolvido por Daniel Teixeira e Pedro Xavier</p>
        </footer>

    </body>
</html>
