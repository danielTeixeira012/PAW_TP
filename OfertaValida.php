<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $input = INPUT_POST;
        require_once __DIR__ . '/Application/Validator/OfertaValidator.php';
        if (count($errors) > 0) {
            require_once __DIR__ . '/AddOferta.php';
        } else {
            $categoria = 1;
            $titulo = filter_input($input, 'tituloO');
            $tipo = "tipo1";
            $informacao = filter_input($input, 'infoO');
            $funcao = filter_input($input, 'funcO');
            $salario = filter_input($input, 'sal');
            $requisitos = filter_input($input, 'req');
            $regiao = filter_input($input, 'regi');
            $status = "so1";
            $oferta = new ofertaTrabalho(12, $categoria, $titulo, $tipo, $informacao, 
                    $funcao, $salario, $requisitos, $regiao, 1, $status) ;       
            $manager = new OfertaManager();
            $manager->insertOferta($oferta);
         
            ?>
            <h2>OFERTA SUBMETIDA</h2>
            <a href="login.php"><input type="submit" value="Pagina Inicial"></a> 
            <?php
        }
        ?>
    </body>
</html>
