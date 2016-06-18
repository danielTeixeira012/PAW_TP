<?php

require_once (realpath(dirname(__FILE__)) . '/../../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');




$errorsE = array();
$input = INPUT_POST;

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'emailE') && filter_input($input, 'emailE')) {
        $email = filter_input($input, 'emailE', FILTER_SANITIZE_EMAIL);
        $manager = new EmpregadorManager();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorsE['emailE'] = 'Email incorrecto';
        }
    } else {
        $errorsE['emailE'] = 'Parametro email nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'nomeE') && filter_input($input, 'nomeE') != '') {
        $nome = filter_input($input, 'nomeE', FILTER_SANITIZE_STRING);
        if (strlen($nome) < 5) {
            $errorsE['nomeE'] = 'Pelo menos 5 caracteres no nome';
        }
    } else {
        $errorsE['nomeE'] = 'Parametro name nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST'){
    if(filter_has_var($input, 'passE') && filter_input($input, 'passE') != ''){
        $password = filter_input($input, 'passE', FILTER_SANITIZE_STRING);
        if(strlen($password) < 5){
            $errorsE['passE'] = 'Pelo menos 5 caracter na password';
        }
    }else{
        $errorsE['passE'] = 'Parametro password nao existe';
    }
    }

