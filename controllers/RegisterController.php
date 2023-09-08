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
        if (isset($_SESSION['flush'])){
            $_SESSION['flush'] = !$_SESSION['flush'];
        }else{
            $_SESSION['flush'] = true;
        }

        if (!$_SESSION['flush']){
            unset($_SESSION['flush']);
//            echo $_SESSION['flush'];
//            exit();
            header("location:/");
        }

        $data = Request::getInstance()->getSanitizedData();
        unset($data['submit']);
        if (!Register::validate($data)) {
            Capsule::table('users')->insert($data);
            header('location: /login');
        } else {
            $errors = Register::validate($data);
            return Render::renderURI('register', params: [
                'errors' => $errors
            ]);
        }
    }

    public function registerPage()
    {
        return Render::renderURI('register');
    }
}