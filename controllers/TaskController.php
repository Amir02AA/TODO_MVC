<?php

namespace controllers;

use core\Render;
use core\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class TaskController
{
    public function showTasks()
    {
        return Render::renderURI('tasks');
    }

    public function CRUDpage()
    {
        return Render::renderURI('tasks/create');
    }

    public function createTask()
    {
            $data = Request::getInstance()->getSanitizedData();
            unset($data['submit']);
            Capsule::table('tasks')->insert($data);

    }

    public function updateTask()
    {

    }
}