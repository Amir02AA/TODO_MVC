<?php

namespace controllers;

use core\Render;
use core\Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use models\Register;

class RegisterController
{
    public function register()
    {
        $data = Request::getInstance()->getSanitizedData();
        unset($data['submit']);
        if (!Register::validate($data)) {
            Capsule::table('users')->insert($data);
            header('location: /login');
        } else {
            $errors = Register::validate($data);
            return Render::renderURI('register',params: [
                'errors' => $errors
            ]);
        }


    }

    public function registerPage()
    {
        return Render::renderURI('register');
    }
}