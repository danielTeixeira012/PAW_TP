<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$errors = array();
$input = INPUT_POST;

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