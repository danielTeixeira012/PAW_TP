<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'TipoOfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../Application/styles/addOfertaCSS.css"/>
    </head>
    <body>
        <form id="formOferta" action="../Application/Validator/verificaLogin.php" method="post">
            <label for="categoria">Categoria</label><select id="categoria" name="categoriaO">
                  <?php
                $categoriaBD = new CategoriasManager();
                $categorias = $categoriaBD->getCategorias();
                foreach ($categorias as $key => $value) {?>
                    <option value="<?=$value['idCategoria'] ?>"><?=$value['nomeCategoria']?></option>    
                    <?php
                }
                ?>
            </select>
            <label for="tituloOferta">Titulo</label><input id="tituloOferta" name="tituloO"
            <label for="tipoOferta">Tipo de oferta</label><select id="tipoOferta" name="tipoO">
                <option value="fullTime">Full-Time</option>
                <option value="partTime">Part-Time</option>
            </select>
            <label for="informacaoOferta">Informações</label><textarea id="informacaoOferta" name="infoO"></textarea>
            <label for="funcaoOferta">Funções</label><textarea id="funcaoOferta" name="funcO"></textarea>
            <label for="regiao">Região</label><input id="regiao" name="regi">
            <label for="salario">Salario</label><input id="salario" name="sal">
            <label for="requisitos">Requisitos</label><textarea id="requisitos" name="req"></textarea>
            <input id="confirm" type="submit" value="ADD OFERTA">
        </form>
    </body>
</html>
