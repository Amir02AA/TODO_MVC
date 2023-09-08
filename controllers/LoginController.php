<?php

namespace controllers;



use core\Application;
use core\Render;
use core\Request;
use helper\Session;
use Illuminate\Database\Capsule\Manager as Capsule;
class LoginController
{
    public function login()
    {
            $data = Request::getInstance()->getSanitizedData();
            unset($data['submit']);
            $username = $data['username'];
            $password = $data['password'];
            $user = Capsule::table('users')->where('username', $username)->where('password', $password)->first();
            if ($user) {
                Session::setSession(new Session($username));
                Session::getSession()->setAuthSession();
                if ($user->isAdmin){
                    header("location:/admin");
                }else{
                    header('Location:/tasks');
                }
            } else echo "user not found";

    }

    public function loginPage()
    {

        return Render::renderURI('login');
    }

}