<?php

namespace controllers;

use core\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class RegisterController
{
    public function register() {
        $data = Request::getInstance()->getSanitizedData();
        unset($data['submit']);
        Capsule::table('users')->insert($data);
    }
}