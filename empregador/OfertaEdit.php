<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CandidaturaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
$empregador = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if($empregador && $tipo){
    if(SessionManager::getSessionValue('tipoUser') !== 'empregador'){
        header('location: ../index.php');
    }
}else{
    header('location: ../index.php');
}
$ofertas = new OfertaManager();
$candidaturaMan = new CandidaturaManager();
$empregadorMan = new EmpregadorManager();
$idOferta = filter_input(INPUT_GET, 'altOfer');
$existCandidaturas = $candidaturaMan->getCandidaturasByIdOferta($idOferta);
require_once __DIR__.'/../Application/Validator/OfertaValidator.php';
if (empty($existCandidaturas)) {
    $oferta = $ofertas->getOfertaByID($idOferta);
    $idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
    if (empty($oferta)) {
        header('Location: AreaEmpregador.php');
    }
    if ($oferta[0]['idEmpregador'] !== $idEmpregador) {
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


            <form id="formOferta" action="OfertaEdita.php?altOfer=<?=$idOferta?>" method="post">
                
                <input type="hidden" id="idOferta" name="idOferta" value="<?= $idOferta ?>">
                
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
               <?= isset($errorsO) && array_key_exists('tituloO', $errorsO) ? $errorsO['tituloO'] : '' ?>
                <label for="tipoOferta">Tipo de oferta</label><select id="tipoOferta" name="tipoO">
                    <option value="fullTime" <?php if ($oferta[0]['tipoOferta'] == 'fullTime') echo ' selected="selected"'; ?>>Full-Time</option>
                    <option value="partTime" <?php if ($oferta[0]['tipoOferta'] == 'partTime') echo ' selected="selected"'; ?>>Part-Time</option>
                </select>
                <label for="informacaoOferta">Informações</label><textarea id="informacaoOferta" name="infoO"><?= $oferta[0]['informacaoOferta'] ?></textarea>
                <?= isset($errorsO) && array_key_exists('infoO', $errorsO) ? $errorsO['infoO'] : '' ?>
                <label for="funcaoOferta">Funções</label><textarea id="funcaoOferta" name="funcO"><?= $oferta[0]['funcaoOferta'] ?></textarea>
                <?= isset($errorsO) && array_key_exists('funcO', $errorsO) ? $errorsO['funcO'] : '' ?>
                <label for="regiao">Região</label><input id="regi" name="regi" value="<?= $oferta[0]['regiao'] ?>">
                <?= isset($errorsO) && array_key_exists('regi', $errorsO) ? $errorsO['regi'] : '' ?>
                <label for="salario">Salario</label><input id="salario" name="sal" value="<?= $oferta[0]['salario'] ?>">
                <?= isset($errorsO) && array_key_exists('sal', $errorsO) ? $errorsO['sal'] : '' ?>
                <label for="req">Requisitos</label><textarea id="requisitos" name="req"><?= $oferta[0]['requisitos'] ?></textarea>
                <?= isset($errorsO) && array_key_exists('req', $errorsO) ? $errorsO['req'] : '' ?>
                <label for="dataLimite">Data Limite Candidatura</label><input id="dataLimite" type="date" name="dataLim" value="<?= $oferta[0]['dataLimite'] ?>">
                <?= isset($errorsO) && array_key_exists('dataLim', $errorsO) ? $errorsO['dataLim'] : '' ?>
                <input type="hidden" id="statusOferta" name="statusO" value="<?= $oferta[0]['statusO'] ?>">
               <?= isset($errorsO) && array_key_exists('statusO', $errorsO) ? $errorsO['statusO'] : '' ?>
                <input id="confirm" type="submit" value="Editar OFERTA">
            </form>
        </body>
    </html>
<?php }else {
    ?>

    <html>
        <head></head>
        <body><p>A candidatura já tem candidaturas e portanto não pode ser alterada</p></body>
    </html>
    <?php
}
?>