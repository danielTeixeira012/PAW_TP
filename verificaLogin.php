<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once __DIR__ . '/Application/Validator/LoginValidator.php';
    require_once __DIR__ . '/Application/Manager/SessionManager.php';
    if (count($errors) == 0) {
        SessionManager::addSessionValue('email', $email);
    }
    
     if (count($errors) > 0) {
            require_once __DIR__ . '/login.php';
        }else{
            header("location: index.php");
        }