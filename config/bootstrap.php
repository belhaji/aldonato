<?php

require 'vendor/autoload.php';
include 'config/credentials.php';


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection($db_settings);

$capsule->bootEloquent();

// protect enviroment variables  
//$dotenv = new Dotenv\Dotenv(__DIR__);
//$dotenv->load();