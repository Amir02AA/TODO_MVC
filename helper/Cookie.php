<?php

namespace helper;

class Cookie
{
    private int $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->setAuthCookie();
    }

    public function setAuthCookie(){
        setcookie('user_id' , $this->userId);
    }

    public static function destroy(){
        setcookie('user_id' , '' , time() - 10);
        setcookie('PHPSESSID' , '' , time() - 10);
        unset($_COOKIE['user_id']);
        unset($_COOKIE['PHPSESSID']);
    }
}