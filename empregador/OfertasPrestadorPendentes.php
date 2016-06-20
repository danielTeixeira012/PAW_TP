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

        <?php require_once '../Application/imports/empregadorHeader.php'; ?>

        <section id="categorias">
            <?php
            $empreg = Empregador::convertArrayToObject($empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]);
            ?>
            <!--Adicionar Imagem -->
            <img id="fotoPerfil" src="../Application/Resources/icons/Principal-01-256 RED.png" >
            <p><b>Nome:</b> <?= $empreg->getNome() ?></p>
            <p><b>Email:</b> <?= $empreg->getEmail() ?></p>
            <p><b>Contato:</b> <?= $empreg->getContato() ?></p>
            <p><b>Morada:</b> <?= $empreg->getMorada() ?></p>
            <p><b>Código Postal:</b> <?= $empreg->getCodPostal() ?></p>
            <p><b>Concelho:</b><?= $empreg->getConcelho() ?></p>
            <p><b>Distrito:</b> <?= $empreg->getDistrito() ?></p>
            <a class="button2" id="editarButton" href="VerPerfil.php">Editar dados...</a>
        </section>


        <section id="opcoes">
 <table>
                <thead>
                <th>ID oferta</th>
                <th>Titulo</th> 

                </thead>
                <?php
                $database = new OfertaManager();
                $empregadorMan = new EmpregadorManager();

                $userEmail = SessionManager::getSessionValue('email');
                $id = $empregadorMan->getIdByMail($userEmail)[0]['idEmpregador'];
                $ofertas = $database->getOfertasPendentesUser($id);


                foreach ($ofertas as $key => $value) {
                    ?>
                    <tr id="<?= $value['idOferta'] ?>"> 
                        <td><?= $value['idOferta'] ?></td>
                        <td><?= $value['tituloOferta'] ?></td>
                        <td><a class="button2" href="../verOfertas.php?oferta=<?= $value['idOferta'] ?>">Ver</a></td>
                        <td><a class="button2" href="OfertaEdit.php?altOfer=<?= $value['idOferta'] ?>">Editar</a></td>
                       

                    </tr>

                    <?php
                }
                ?>

            </table>

           


        </section>


            <footer id="foot">
                <p>&copy;2016 - Desenvolvido por Daniel Teixeira e Pedro Xavier</p>
            </footer>

    </body>
</html>

       