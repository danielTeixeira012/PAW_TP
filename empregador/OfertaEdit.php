<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
$empregador = SessionManager::existSession('email');
$ofertas = new OfertaManager();
$idOferta = filter_input(INPUT_GET, 'altOfer');
$oferta = $ofertas->getOfertaByID($idOferta);
$empregadorMan = new EmpregadorManager();
$idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
if(empty($oferta)){
    header('Location: AreaEmpregador.php');
}
if ($oferta[0]['idEmpregador'] !== $idEmpregador ) {
    header('Location: AreaEmpregador.php');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Application/styles/addOfertaCSS.css"/>
        <title></title>
    </head>
    <body>


        <form id="formOferta" action="../Application/Validator/OfertaEdita.php" method="post">
            <input type="hidden" name="idOferta" value="<?= $idOferta ?>">
            <label for="categoria">Categoria</label><select id="categoria" name="categoriaO">
                <?php
                $categoriaBD = new CategoriasManager();
                $categorias = $categoriaBD->getCategorias();
                foreach ($categorias as $key => $value) {
                    ?>
                    <option value="<?= $value['idCategoria'] ?>" <?php if ($oferta[0]['idCategoria'] == $value['idCategoria']) echo ' selected="selected"'; ?>><?= $value['nomeCategoria'] ?></option>    
                    <?php
                }
                ?>
            </select>
            <label for="tituloOferta">Titulo</label><input id="tituloOferta" name="tituloO" value="<?= $oferta[0]['tituloOferta'] ?>">
            <label for="tipoOferta">Tipo de oferta</label><select id="tipoOferta" name="tipoO">
                <option value="fullTime" <?php if ($oferta[0]['tipoOferta'] == 'fullTime') echo ' selected="selected"'; ?>>Full-Time</option>
                <option value="partTime" <?php if ($oferta[0]['tipoOferta'] == 'partTime') echo ' selected="selected"'; ?>>Part-Time</option>
            </select>
            <label for="informacaoOferta">Informações</label><textarea id="informacaoOferta" name="infoO"><?= $oferta[0]['informacaoOferta'] ?></textarea>
            <label for="funcaoOferta">Funções</label><textarea id="funcaoOferta" name="funcO"><?= $oferta[0]['funcaoOferta'] ?></textarea>
            <label for="regiao">Região</label><input id="regiao" name="regi" value="<?= $oferta[0]['regiao'] ?>">
            <label for="salario">Salario</label><input id="salario" name="sal" value="<?= $oferta[0]['salario'] ?>">
            <label for="requisitos">Requisitos</label><textarea id="requisitos" name="req"><?= $oferta[0]['requisitos'] ?></textarea>
            <label for="dataLimite">Data Limite Candidatura</label><input id="dataLimite" type="date" name="dataLim" value="<?= $oferta[0]['dataLimite'] ?>">
            <input type="hidden" id="statusOferta" name="statusO" value="<?= $oferta[0]['statusO'] ?>">

<!--            <label for="statusOferta">Estado da oferta</label><select id="statusOferta" name="statusO">   
                <option value="pendente">Submeter sem publicar(Pendente)</option>
                <option value="publicada">Publicar(Publicada)</option>
            </select>-->
            <input id="confirm" type="submit" value="Editar OFERTA">
        </form>
    </body>
</html>
