<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
if ($session && $tipo) {
    $tipoUtilizador = SessionManager::getSessionValue('tipoUser');
    if ($tipoUtilizador === 'prestador') {
        ?>
        <section id="loginSec">
            <p>Bem vindo <?= SessionManager::getSessionValue('email') ?>  <a id="logout" href="/PAW_TP/logOut.php"><button>LogOut</button></a></p>
            <!--<a href="/PAW_TP/areaPessoalPrestador.php">Area Pessoal</a>-->
        </section>
        <?php
    } else if ($tipoUtilizador === 'empregador') {
        ?>
        <section id="loginSec">
            <p>Bem vindo <?= SessionManager::getSessionValue('email') ?>  <a id="logout" href="/PAW_TP/logOut.php"><button>LogOut</button></a></p>
            <!--<a href="/PAW_TP/empregador/AreaEmpregador.php">Area Pessoal</a>-->
        </section>
        <?php
    } else if ($tipoUtilizador === 'administrador') {
        ?>
        <section id="loginSec">
            <p>Bem vindo <?= SessionManager::getSessionValue('email') ?>  <a id="logout" href="/PAW_TP/logOut.php"><button>LogOut</button></a></p>
            <!--<a href="/PAW_TP/administrador/AreaAdministrador.php">Area de Administração</a>-->
        </section>
        <?php
    }
} else {
    require_once __DIR__ . '/Application/Validator/LoginValidator.php';
    ?>
    <section id="loginSec">
        <form id="registo" action="Application/Validator/verificaLogin.php" method="post">
            <input id="email" type="email" name="email" placeholder="Email" required><?= isset($errors) && array_key_exists('email', $errors) ? $errors['email'] : '' ?>
            <input id="pass" type="password" placeholder="Password" name="pass" required>
            <input id="login" type="submit" value="Login"> 
            <a  id="registoButton" href="registo.php" >Registar</a>
        </form>
        
    </section>
    <?php
}
?>