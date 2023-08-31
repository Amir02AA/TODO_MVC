<?php
include_once "vendor/autoload.php";
include_once "database/config.php";

use app\App;
use app\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

//$results = Capsule::table('users')->get();
//var_dump($results);
//exit();
$app = new App();

$app->router->get('/register', 'register');

$app->router->post('/register', function () {
    $data = Request::getSanitizedData();
    unset($data['submit']);
    Capsule::table('users')->insert($data);
});
$app->router->get('/login','login');
$app->router->post('/login', function () {
    $data = Request::getSanitizedData();
    unset($data['submit']);
    $username = $data['username'];
    $password = $data['password'];
    $user = Capsule::table('users')->where('username', $username)->where('password', $password)->first();
    if ($user) {
        echo "login";
    } else echo "user not found";

});

$app->router->get('/tasks/create' , 'tasks/create');
$app->router->post('/tasks', function (){
    $data = Request::getSanitizedData();
    unset($data['submit']);
    Capsule::table('tasks')->insert($data);
});
//$app->router->get('/home','home');
//$app->router->get('/','home');


$app->run();