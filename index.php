<?php
include_once "vendor/autoload.php";

$app = new App();
$app->router->get('/home','home');
$app->router->get('/','home');
$app->router->get('/shop','shop');

$app->router->post('/test','test');
$app->router->get('/test','test');
$app->router->setLayout('panel');

$r = new Request();
echo $r->getUrl();
//$app->router->get('/login','login');

//echo "<pre>";
//print_r($app->router->getFuncs());
//echo "<pre>";
$app->run();