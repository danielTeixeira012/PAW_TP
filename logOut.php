<?php
require_once __DIR__ . '/Application/Manager/SessionManager.php';

if(SessionManager::existSession('email')){
    SessionManager::deleteSessionValue('email');
    SessionManager::deleteSessionValue('tipoUser');
    header('location: index.php');
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

