<?php

require './Mind.php';

$conf = array(
    'host'      =>  'localhost',
    'dbname'    =>  'auth',
    'username'  =>  'root',
    'password'  =>  ''
);

$Mind = new Mind($conf);

$Mind->route('/', 'app/views/index', 'app/migration/install');
$Mind->route('register', 'app/views/register');
$Mind->route('login', 'app/views/login');
$Mind->route('logout', 'app/request/logout');
$Mind->route('dashboard', 'app/views/dashboard');

$Mind->route('api/register', 'app/request/register');
$Mind->route('api/login', 'app/request/login');

