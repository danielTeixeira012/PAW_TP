<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
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
$manager = new PrestadorManager();

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    if (filter_has_var($input, 'email') && filter_input($input, 'email') != '' && filter_has_var($input, 'pass') && filter_input($input, 'pass')) {
        if(filter_input($input, 'email', FILTER_SANITIZE_EMAIL)){
            $email = filter_input($input, 'email');
            $password = filter_input($input, 'pass');
            if(!$manager->existsPrestadorServico($email, $password)){
                $errors['email'] = "erro";
            }
        }
    }else{
        
    $errors['username'] = "erro";
    }
}
