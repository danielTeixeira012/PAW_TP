<?php 
require_once __DIR__ . '/Application/Manager/SessionManager.php';
if(SessionManager::existSession('email')){
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
        <title></title>
    </head>
    <body>
        <?php
        require_once __DIR__ . '/Application/Validator/LoginValidator.php';
        ?>
        <form action="verificaLogin.php" method="post">
            <label for="email">Email</label><input id="email" type="email" name="email" required><?= isset($errors) && array_key_exists('email', $errors) ? $errors['email'] : ''?>
            <label for="pass">Password</label><input id="pass" type="password" name="pass" required>
            <input id="login" type="submit" value="Login">
        </form>
        <a href="registo.php"><button id="registo">Registar</button></a>
    </body>
</html>
