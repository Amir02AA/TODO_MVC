<?php
namespace database;
//include_once "../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'todo',
    'username' => 'root',
    'password' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
