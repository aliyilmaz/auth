<?php

require './Mind.php';

$conf = array(
    'host'      =>  'localhost',
    'dbname'    =>  'mydb',
    'username'  =>  'root',
    'password'  =>  ''
);

$Mind = new Mind($conf);

$Mind->route('/', 'app/views/welcome');
