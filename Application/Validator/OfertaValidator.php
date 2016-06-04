<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'OfertaManager.php');

$errors = array();
$input = INPUT_POST;

//categoria
//if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
//    if (filter_has_var($input, 'categoriaO') && filter_input($input, 'categoriaO')) {
//       $mail = filter_input($input, 'categoriaO', FILTER_SANITIZE_EMAIL);
//        
//    } else {
//        $errors['categoriaO'] = 'A categoria é inválida';
//    }
//}


if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'tituloO') && filter_input($input, 'tituloO')) {
       $titulo = filter_input($input, 'tituloO', FILTER_SANITIZE_EMAIL); 
    } else {
        $errors['categoria'] = 'A categoria é inválida';
    }
}

//TipoOferta

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'infoO') && filter_input($input, 'infoO')) {
       $informacao = filter_input($input, 'infoO', FILTER_SANITIZE_EMAIL); 
    } else {
        $errors['infoO'] = 'A categoria é inválida';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'funcO') && filter_input($input, 'funcO')) {
       $funcao = filter_input($input, 'funcO', FILTER_SANITIZE_EMAIL); 
    } else {
        $errors['funcO'] = 'A categoria é inválida';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'regi') && filter_input($input, 'regi')) {
       $regiao = filter_input($input, 'regi', FILTER_SANITIZE_EMAIL); 
    } else {
        $errors['regi'] = 'A categoria é inválida';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'sal') && filter_input($input, 'sal')) {
       $salario = filter_input($input, 'sal', FILTER_SANITIZE_EMAIL); 
    } else {
        $errors['sal'] = 'A categoria é inválida';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'req') && filter_input($input, 'req')) {
       $requisitos = filter_input($input, 'req', FILTER_SANITIZE_EMAIL); 
    } else {
        $errors['req'] = 'A categoria é inválida';
    }
}

//statusoferta




