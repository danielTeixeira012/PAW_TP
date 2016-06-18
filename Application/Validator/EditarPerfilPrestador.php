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

$erros = array();
$input = INPUT_POST;


if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'nomePrestador') && filter_input($input, 'nomePrestador') != '') {
        $name = filter_input($input, 'nomePrestador', FILTER_SANITIZE_STRING);
        if (strlen($name) < 5) {
            $erros['nomePrestador'] = 'Novo parametro deve ter pelo menos 5 caracteres no nome';
        }
    } else {
        $erros['nomePrestador'] = 'Novo parametro nome nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'passPrestador') && filter_input($input, 'passPrestador') != '') {
        $pass = filter_input($input, 'passPrestador', FILTER_SANITIZE_STRING);
        if (strlen($pass) < 5) {
            $erros['passPrestador'] = 'Novo parametro deve ter pelo menos 5 caracter na password';
        }
    } else {
        $erros['passPrestador'] = 'Novo parametro password nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (!(filter_has_var($input, 'contactoPrestador') && filter_input($input, 'contactoPrestador') != '')) {
        $erros['contactoPrestador'] = 'Novo parametro contacto nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (!(filter_has_var($input, 'moradaPrestador') && filter_input($input, 'moradaPrestador') != '')) {
        $erros['moradaPrestador'] = 'Novo parametro morada nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (!(filter_has_var($input, 'moradaPrestador') && filter_input($input, 'moradaPrestador') != '')) {
        $erros['moradaPrestador'] = 'Novo parametro morada nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (!(filter_has_var($input, 'codigopostalPrestador') && filter_input($input, 'codigopostalPrestador') != '')) {
        $erros['codigopostalPrestador'] = 'Novo parametro codigo postal nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (!(filter_has_var($input, 'distritoPrestador') && filter_input($input, 'distritoPrestador') != '')) {
        $erros['distritoPrestador'] = 'Novo parametro distrito postal nao existe';
    }
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (!(filter_has_var($input, 'concelhoPrestador') && filter_input($input, 'concelhoPrestador') != '')) {
        $erros['concelhoPrestador'] = 'Novo parametro concelho nao existe';
    }
}

