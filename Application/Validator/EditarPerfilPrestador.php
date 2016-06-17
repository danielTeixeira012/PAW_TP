<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$errors = array();
$input = INPUT_POST;

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'emailP') && filter_input($input, 'emailP')) {
        $mail = filter_input($input, 'emailP', FILTER_SANITIZE_EMAIL);
        $manager = new PrestadorManager();
        $exist = $manager->verifyEmail($mail);
        if ($exist !== array() && $exist[0]['email'] === $mail) {
            $errors['emailP'] = 'Email já existe';
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['emailP'] = 'Email incorrecto';
        }
    } else {
        $errors['emailP'] = 'Parametro email nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'nomeP') && filter_input($input, 'nomeP') != '') {
        $name = filter_input($input, 'nomeP', FILTER_SANITIZE_STRING);
        if (strlen($name) < 5) {
            $errors['nomeP'] = 'Pelo menos 5 caracteres no nome';
        }
    } else {
        $errors['nomeP'] = 'Parametro name nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'passP') && filter_input($input, 'passP') != '') {
        $pass = filter_input($input, 'passP', FILTER_SANITIZE_STRING);
        if (strlen($pass) < 5) {
            $errors['passP'] = 'Pelo menos 5 caracter na password';
        }
    } else {
        $erros['passP'] = 'Parametro password nao existe';
    }
}
