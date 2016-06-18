<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'PrestadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'AdministradorManager.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$errors = array();
$input = INPUT_POST;

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'email') && filter_input($input, 'email') != '' && filter_has_var($input, 'pass') && filter_input($input, 'pass')) {
        if (filter_input($input, 'email', FILTER_SANITIZE_EMAIL)) {
            $email = filter_input($input, 'email');
            $password = filter_input($input, 'pass');
            $managerPrestador = new PrestadorManager();
            $managerEmpregador = new EmpregadorManager();
            $managerAdministrador = new AdministradorManager();
            if ($managerPrestador->existsPrestadorServico($email, $password)) {
                $tipoUser = 'prestador';
            } else if ($managerEmpregador->existsEmpregador($email, $password)) {
                $tipoUser = 'empregador';
            }else if($managerAdministrador->existsAdministrador($email, $password)){
                    $tipoUser = 'administrador';
            } else {
                $errors['email'] = "erro";
            }
        }
    } else {

        $errors['email'] = "erro";
    }
}
