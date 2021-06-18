<?php
session_start();

require_once 'classes/Database.php';
require_once 'classes/Config.php';
require_once 'classes/Validate.php';
require_once 'classes/Input.php';
require_once 'classes/Session.php';
require_once 'classes/User.php';

 

$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'samedia',
    ],

    'session' => [
        'token_name' => 'token',
        'user_session' => 'user',
    ]
 ];
