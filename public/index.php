<?php
include_once "../vendor/autoload.php";
include_once "../database/config.php";

use core\Application;
use controllers\LoginController;
use core\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = new \core\Application();

$app->router->get('/', [controllers\RegisterController::class,'registerPage']);
$app->router->post('/', [controllers\RegisterController::class,'register']);
$app->router->get('/login',[LoginController::class,'loginPage']);
$app->router->get('/tasks',[controllers\TaskController::class,'showTasks']);
$app->router->get('/tasks/create' , [\controllers\TaskController::class,'CRUDpage']);

$app->router->post('/login', [LoginController::class,'login']);
$app->router->post('/register',[controllers\RegisterController::class,'register']);
$app->router->get('/register',[controllers\RegisterController::class,'register']);
$app->router->post('/tasks/create', [controllers\TaskController::class,'TaskManager']);

$app->run();