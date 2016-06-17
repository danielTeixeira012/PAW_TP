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
                <a href="AddOferta.php">Adicionar Oferta!!</a>
            </header>

            <section id="categorias">
                <?php
                $empreg = Empregador::convertArrayToObject($empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]);
                ?>
                <!--Adicionar Imagem -->
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
                <table>
                    <tr>
                        <th>Titulo</th>
                        <th>Estado</th> 

                    </tr>
                    <?php
                    $database = new OfertaManager();


                    $userEmail = SessionManager::getSessionValue('email');
                    $id = $empregadorMan->getIdByMail($userEmail)[0]['idEmpregador'];
                    $ofertas = $database->getOfertaUser($id);


                    foreach ($ofertas as $key => $value) {
                        ?>
                        <tr> 

                            <td><?= $value['tituloOferta'] ?></td>
                            <td><?= $value['statusO'] ?></td>
                            <td><a href="OfertaEdit.php?altOfer=<?= $value['idOferta'] ?>">Ver</a></td>
                            <td><a href="verOferta.php?altOfer=<?= $value['idOferta'] ?>">Remover</a></td>
                        </tr>

                        <?php
                    }
                    ?>

                </table>

                <a href="AddOferta.php">Adicionar novas Ofertas</a>

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