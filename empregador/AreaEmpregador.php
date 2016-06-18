<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$empregadorMan = new EmpregadorManager();
if ($session) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link  rel="stylesheet" type="text/css" href="../Application/styles/index.css">
        </head>
        <body>

            <header id="head">         
                <h1>Procura Emprego</h1>
                <?php
                require_once __DIR__ .'/../login.php';
                ?>
                <a href="../index.php">Home</a>
            </header>

            <section id="categorias">
                <?php
                $empreg = Empregador::convertArrayToObject($empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]);
                ?>
                <!--Adicionar Imagem -->
                <?= $empreg->getIdEmpregador() ?>
                <p>Nome: <?= $empreg->getNome() ?></p>
                <p>Email: <?= $empreg->getEmail() ?></p>
                <p>Contato: <?= $empreg->getContato() ?></p>
                <p>Morada: <?= $empreg->getMorada() ?></p>
                <p>Código Postal: <?= $empreg->getCodPostal() ?></p>
                <p>Concelho: <?= $empreg->getConcelho() ?></p>
                <p>Distrito: <?= $empreg->getDistrito() ?></p>
                <a href="EditEmpregador.php">Editar dados...</a>
            </section>


            <section id="ofertas">
                <a href="AddOferta.php">Adicionar novas Ofertas</a>
                <a href="OfertasPrestadorPendentes.php">Ofertas Pendentes</a>
                <a href="OfertasPrestadorPublicadas.php">Ofertas Publicadas</a>

            </section>




            <footer id="foot">
                <p>&copy;2016 - Desenvolvido por Daniel Teixeira e Pedro Xavier</p>
            </footer>

        </body>
    </html>
    <?php
} else {
    header('location: ../login.php');
}
?>