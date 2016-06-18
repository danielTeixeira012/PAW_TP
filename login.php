<?php
require_once (realpath(dirname(__FILE__)) . '/Config.php');
use Config as Conf;
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
$session = SessionManager::existSession('email');
$tipo = SessionManager::existSession('tipoUser');
            if ($session && $tipo) {
                    $tipoUtilizador = SessionManager::getSessionValue('tipoUser');
                if($tipoUtilizador === 'prestador'){
                ?>
                    <p>Bem vindo <?= SessionManager::getSessionValue('email')?>  <a id="logout" href="logOut.php"><button>LogOut</button></a></p>
                    <a href="areaPessoalPrestador.php">Area Pessoal</a>
                    
                <?php 
                }
                else{
                    if($tipoUtilizador === 'empregador'){
                    ?>
                    <p>Bem vindo <?= SessionManager::getSessionValue('email')?>  <a id="logout" href="logOut.php"><button>LogOut</button></a></p>
                    <a href="empregador/AreaEmpregador.php">Area Pessoal</a>
                    <?php
                    }else{
                        if($tipoUtilizador === 'administrador'){
                            ?>
                                <p>Bem vindo <?= SessionManager::getSessionValue('email')?>  <a id="logout" href="logOut.php"><button>LogOut</button></a></p>
                                <a href="administrador/AreaAdministrador.php">Area de Administração</a>
                             <?php
                        }
                    }
                }
                
            } else {
                require_once __DIR__ . '/Application/Validator/LoginValidator.php';
                ?>
                <form id="registo" action="Application/Validator/verificaLogin.php" method="post">
                    <label for="email">Email</label><input id="email" type="email" name="email" required><?= isset($errors) && array_key_exists('email', $errors) ? $errors['email'] : '' ?>
                    <label for="pass">Password</label><input id="pass" type="password" name="pass" required>
                    <input id="login" type="submit" value="Login">
                </form>
                <a href="registo.php" ><button id="registoButton">Registar</button></a>

                <?php
            }
            ?>