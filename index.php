<?php

require './Mind.php';

$conf = array(
    'host'      =>  'localhost',
    'dbname'    =>  'auth',
    'username'  =>  'root',
    'password'  =>  ''
);

$Mind = new Mind($conf);

$Mind->route('/', 'app/views/welcome');
$Mind->route('install', 'app/migration/install');
$Mind->route('register', 'app/views/register');
$Mind->route('login', 'app/views/login');
