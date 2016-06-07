<?php
require_once __DIR__ . '/Application/Manager/SessionManager.php';

SessionManager::deleteSessionValue('email');
header('location: login.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

