<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $idOferta = filter_input(INPUT_GET, 'oferta');
        $man = new OfertaManager();
        $res = $man->getOfertaByID($idOferta);
        $manEmpregador = new EmpregadorManager();
        if ($res != array()) {
            $pre = $manEmpregador->getEmpregadorByID($res[0]['idEmpregador']);
            ?>
            <h2>Titulo Oferta: <?= $res[0]['tituloOferta'] ?></h2>
            <p>Informação Oferta: <?= $res[0]['informacaoOferta'] ?></p>
            <p>Função Oferta: <?= $res[0]['funcaoOferta'] ?></p>
            <p>Salario: <?= $res[0]['salario'] ?></p>
            <p>Requisitos: <?= $res[0]['requisitos'] ?></p>
            <p>Regiao: <?= $res[0]['regiao'] ?></p>
            <p>Tipo Oferta: <?= $res[0]['tipoOferta'] ?></p>
            <p>Empregador: <?= $pre[0]['email'] ?></p>

            <?php
        }else{
            ?>
            <h2>Não colocou nenhum favorita na oferta com o id <?=$idOferta?></h2>
            <?php
        }
        ?>
        <a href="ofertasTrabalhoFinalizadas.php"><button>Voltar</button></a>
    </body>
</html>
