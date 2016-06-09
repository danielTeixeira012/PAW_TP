<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$errorsE = array();
$input = INPUT_POST;

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'emailE') && filter_input($input, 'emailE')) {
        $mail = filter_input($input, 'emailE', FILTER_SANITIZE_EMAIL);
        $manager = new EmpregadorManager();
        $exist = $manager->verifyEmail($mail);
        /**
         * verificar se o email tambem existe na outro tipo de utilizador
         */
        if($exist !== array() && $exist[0]['email'] === $mail){
            $errorsE['emailE'] = 'Email já existe';
        }
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $errorsE['emailE'] = 'Email incorrecto';
        }
    } else {
        $errorsE['emailE'] = 'Parametro email nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'nomeE') && filter_input($input, 'nomeE') != '') {
        $name = filter_input($input, 'nomeE', FILTER_SANITIZE_STRING);
        if (strlen($name) < 5) {
            $errorsE['nomeE'] = 'Pelo menos 5 caracteres no nome';
        }
    } else {
        $errorsE['nomeE'] = 'Parametro name nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST'){
    if(filter_has_var($input, 'passE') && filter_input($input, 'passE') != ''){
        $pass = filter_input($input, 'passE', FILTER_SANITIZE_STRING);
        if(strlen($pass) < 5){
            $errorsE['passE'] = 'Pelo menos 5 caracter na password';
        }
    }else{
        $errorsE['passE'] = 'Parametro password nao existe';
    }
    }
