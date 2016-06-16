<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');
use Config as Conf;
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
            if ($session) {
                ?>
                <p>Bem vindo <?= SessionManager::getSessionValue('email') . SessionManager::getSessionValue('tipoUser')  ?>  <a id="logout" href="logOut.php"><button>LogOut</button></a></p>
                
                <?php
                
            } else {
                require_once __DIR__ . '/Application/Validator/LoginValidator.php';
                ?>
                <form id="registo" action="/PAW_TP/Application/Validator/verificaLogin.php" method="post">
                    <label for="email">Email</label><input id="email" type="email" name="email" required><?= isset($errors) && array_key_exists('email', $errors) ? $errors['email'] : '' ?>
                    <label for="pass">Password</label><input id="pass" type="password" name="pass" required>
                    <input id="login" type="submit" value="Login">
                </form>
                <a href="registo.php" ><button id="registoButton">Registar</button></a>

                <?php
            }
            ?>