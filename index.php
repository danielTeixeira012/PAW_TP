<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link  rel="stylesheet" type="text/css" href="Application/styles/index.css">
        <script src="Application/Libs/jquery-2.2.4.js"></script>
        <script src="Application/JS/PesquisaJS.js"></script>
    </head>
    <body>

        <header id="head">         
            <h1>Procura Emprego</h1>
            <?php
            require_once __DIR__ . '/login.php';
            ?>

            <!--            <nav>
                            <ul>
                                <li><a href="google.pt">+ Vista</a></li>
                                <li><a href="google.pt">+ Vista</a></li>
                            </ul>
                        </nav>-->
        </header>
        <section id="pesquisar">
            <label>Pesquisa</label>
            <!-- passar para for depois -->
            <select id="areaPesquisa" name="areaPesquisa">
                <option value="Informática">Informática</option>
                <option value="Economia">Economia</option>
                <option value="Ciências Exatas">Ciências Exatas</option>
                <option value="Línguas">Línguas</option>
                <option value="Matemáticas">Matemáticas</option>
            </select>
            <button id="pesquisa">Pesquisa</button>
            <button id="apagar">Apagar Pesquisa</button>
            <section id="resultado"></section>
        </section>
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
                    <ul>
                        <input type='hidden' id='<?= $value['idOferta'] ?>'>
                        <li><h2><?= $value['tituloOferta'] ?></h2><li>
                        <li>Região: <?= $value['regiao'] ?></li>
                        <li>Categoria: ir buscar a categoria</li>
                        <?php
                        if ($session && $tipo) {
                            if (SessionManager::getSessionValue('tipoUser') === 'prestador') {
                                $manPre = new PrestadorManager();
                                $res = $manPre->verifyEmail(SessionManager::getSessionValue('email'));
                                $manCan = new CandidaturaManager();
                                $resCan = $manCan->getCandidaturaByIdPrestadorAndStatusCandidaturasAndIdOferta($res[0]['idPrestador'], 'favorita', $value['idOferta']);
                                if($resCan === array()){
                                    ?>
                                        <li><a href="adicionarFavoritos.php?oferta=<?=$value['idOferta']?>">Favorito</a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
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
