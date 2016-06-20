<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'SubcategoriaManager.php');
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
            <h1>Ofertas de Trabalho para Todos</h1>
            <?php
            require_once __DIR__ . '/login.php';
            if ($session) {
                ?>
                <nav>
                    <ul>
                        <li><a href="/"><img class="navButtons" src="Application/Resources/icons/House-256.png"></a></li>
                        <?php
                        if ($tipoUtilizador === 'prestador') {
                            ?>
                        <li><a href="/PAW_TP/areaPessoalPrestador.php"><img class="navButtons" src="Application/Resources/icons/User-Group-256.png"></a></li>
                            <?php
                        } else if ($tipoUtilizador === 'empregador') {
                            ?>
                        <li><a href="/PAW_TP/empregador/AreaEmpregador.php"><img class="navButtons" src="Application/Resources/icons/User-Group-256.png"></a></li>

                            <?php
                        } else if ($tipoUtilizador === 'administrador') {
                            ?>
                        <li><a href="/PAW_TP/administrador/AreaAdministrador.php"><img class="navButtons" src="Application/Resources/icons/User-Group-256.png"></a></li>
                            <?php
                        }
                        ?>
                    </ul> 
                </nav>
                <?php
            }
            ?>

        </header>
        <!--<section id = "pesquisar">
        <label>Pesquisa</label>

        <select id = "areaPesquisa" name = "areaPesquisa">
        <option value = "Informática">Informática</option>
        <option value = "Economia">Economia</option>
        <option value = "Ciências Exatas">Ciências Exatas</option>
        <option value = "Línguas">Línguas</option>
        <option value = "Matemáticas">Matemáticas</option>
        </select>
        <button id = "pesquisa">Pesquisa</button>
        <button id = "apagar">Apagar Pesquisa</button>
        <section id = "resultado"></section>
        </section>
        -->
        <section id = "categorias">
            <form>
                <?php
                $categoriaBD = new CategoriasManager();
                $categorias = $categoriaBD->getCategorias();
                foreach ($categorias as $key => $value) {
                    ?>     
                    <label for="<?= $value['idCategoria'] ?>"><input id="<?= $value['idCategoria'] ?>" type="checkbox"/><?= $value['nomeCategoria'] ?></label>  
                    <?php
                    $subcMan = new SubcategoriaManager();
                    $subc = $subcMan->getCategoriasByIdCategoria($value['idCategoria']);
                    foreach ($subc as $key => $value) {
                        ?>
                        <label id="subcategoria" style="margin-left:10px;" for="<?= $value['idSubcategoria'] ?>"><input id="<?= $value['idSubcategoria'] ?>" type="checkbox"/><?= $value['nomeSubcategoria'] ?></label>  
                        <?php
                    }
                }
                ?>   

            </form>
        </section>
        <section id="ofertas">

            <?php
            $database = new OfertaManager();
            $ofertas = $database->getOfertasPublicadas();

            foreach ($ofertas as $key => $value) {
                ?>

                <article>
                    <section>
                        <a href="verOfertas.php?oferta=<?= $value['idOferta'] ?>">
                            <img src="Application/Resources/Images/entrevista_emprego.jpg"/>
                            <input type='hidden' id='<?= $value['idOferta'] ?>'/>
                            <h2><?= $value['tituloOferta'] ?></h2>
                            <p><b>Região:</b> <?= $value['regiao'] ?></p>
                            <p><b>Categoria:</b> ir buscar a categoria</p>
                    </section>
                    <?php
                    if ($session && $tipo) {
                        if (SessionManager::getSessionValue('tipoUser') === 'prestador') {
                            $manPre = new PrestadorManager();
                            $res = $manPre->verifyEmail(SessionManager::getSessionValue('email'));
                            $manCan = new CandidaturaManager();
                            $resCan = $manCan->getCandidaturaByIdPrestadorAndStatusCandidaturasAndIdOferta($res[0]['idPrestador'], 'favorita', $value['idOferta']);
                            if ($resCan === array()) {
                                ?>

                                <a href="adicionarFavoritos.php?oferta=<?= $value['idOferta'] ?>"><img class="favorito" src="Application/Resources/icons/starplus.png" alt="favorito"></a>
                                <?php
                            } else {
                                ?>
                                <a href="adicionarFavoritos.php?oferta=<?= $value['idOferta'] ?>"><img class="favorito" src="Application/Resources/icons/star.png" alt="favorito"></a>

                                <?php
                            }
                        }
                    }
                    ?>

                    </a>
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
