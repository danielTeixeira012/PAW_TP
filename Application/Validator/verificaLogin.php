<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once __DIR__ . '/LoginValidator.php';
    require_once __DIR__ . '/../Manager/SessionManager.php';
    if (count($errors) == 0) {
        SessionManager::addSessionValue('email', $email);
    }
    
     if (count($errors) > 0) {
            require_once '../../login.php';
        }else{
            header("location: ../../index.php");
        }