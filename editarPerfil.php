<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if ($session && $tipo) {
    if(SessionManager::getSessionValue('tipoUser') !== 'prestador'){
        header('location: index.php');
    }
}else{
    header('location: index.php');
}
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
        <title>Editar Perfil</title>
    </head>
    <body>
        <?php
        require_once __DIR__ . '/Application/Validator/EditarPerfilPrestador.php';
        
        if(count($erros) > 0){
            require_once __DIR__ . '/verPerfilPrestador.php';
        }else{
            $email = filter_input(INPUT_POST, 'emailPrestador');
            $password = filter_input(INPUT_POST, 'passPrestador');
            $nome = filter_input(INPUT_POST, 'nomePrestador');
            $contacto = filter_input(INPUT_POST, 'contactoPrestador');
            $morada = filter_input(INPUT_POST, 'moradaPrestador');
            $codigoPostal = filter_input(INPUT_POST, 'codigopostalPrestador');
            $distrito = filter_input(INPUT_POST, 'distritoPrestador');
            $concelho = filter_input(INPUT_POST, 'concelhoPrestador');
            $manager = new PrestadorManager();
            $res = $manager->verifyEmail($email);
            $newPrestador = new PrestadorServico($res[0]['idPrestador'],$email, $password, $nome, $contacto, $res[0]['fotoPath'], $morada, $codigoPostal, $distrito, $concelho);
            $manager->updatePrestador($newPrestador);
            ?>
            <h2>Dados alterados</h2>
            <a href="areaPessoalPrestador.php"><button>Voltar</button></a>
        <?php
        }
        ?>
    </body>
</html>
