<?php

namespace core;

class Application
{
    public Router $router;

    public function __construct()
    {
        session_start();
        $this->router = Router::getInstance();
    }

    public function run()
    {
        echo $this->router->resolve();
    }

}