<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (ENVIRONMENT == 'development') {
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '5';
    $config['smtp_user'] = 'airporttransferwebdesign@gmail.com';
    $config['smtp_pass'] = '4jkh87^7';
} elseif (ENVIRONMENT == 'testing') {
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://lv-shared03.cpanelplatform.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '5';
    $config['smtp_user'] = 'no-reply@workupdate.net';
    $config['smtp_pass'] = 'c0redreams1984';
}

$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['mailtype'] = 'html'; // or text
$config['validation'] = TRUE; // bool whether to validate email or not  