<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link  rel="stylesheet" type="text/css" href="Application/styles/index.css">
    </head>
    <body>

        <header id="head">         
            <h1>Procura Emprego</h1>
            <?php 
            require_once __DIR__ .'/login.php';
            ?>
            <a href="empregador/AddOferta.php">Adicionar Oferta!!</a>
            <a href="empregador/areaEmpregador.php">Empregador!!</a>
        </header>
        <section id="categorias">
            <form>
                <?php
                $categoriaBD = new CategoriasManager();
                $categorias = $categoriaBD->getCategorias();
                foreach ($categorias as $key => $value) {
                    ?>     
                    <label for="<?= $value['idCategoria'] ?>"><input id="<?= $value['idCategoria'] ?>" type="checkbox"/><?= $value['nomeCategoria'] ?></label>  
                    <?php
                }
                ?>      
            </form>
        </section>
        <section id="ofertas">

            <?php
            $database = new OfertaManager();
            $ofertas = $database->getOfertas();

            foreach ($ofertas as $key => $value) {
                ?>
                <article>  
                    <img src="Application/Resources/Images/entrevista_emprego.jpg"/>
                    <h2><?= $value['tituloOferta'] ?></h2>
                    <p>Região: <?= $value['regiao'] ?></p>
                    <p>Categoria: ir buscar a categoria</p>

                </article>

                <?php
            }
            ?>
        </section>
        <footer id="foot">
            <p>&copy;2016 - Desenvolvido por Daniel Teixeira e Pedro Xavier</p>
        </footer>
    </body>
</html>
