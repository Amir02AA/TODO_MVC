<?php

namespace models;

class Register
{

    public static function validate($data)
    {
        $errorsV = [];
        $rules = [
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['email', 'required']
        ];
        $messages = [
            'required' => 'this field is required',
            'email' => 'this is not a valid email'

        ];
        $validator = getValidator($data, $rules, $messages);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
        }

        return (!empty($errors)) ? $errors : false;
    }
}