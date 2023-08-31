<?php
include_once "vendor/autoload.php";
include_once "database/config.php";

use app\App;
use Illuminate\Database\Capsule\Manager as Capsule;
//$results = Capsule::table('users')->get();
//var_dump($results);
//exit();
$app = new App();

$app->router->get('/register','register');

$app->router->post('/register',function (){
    $data = \app\Request::getSanitizedData();
    unset($data['submit']);
    Capsule::table('users')->insert($data);
});
//$app->router->get('/home','home');
//$app->router->get('/','home');


$app->run();