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
        $data = ['name' => Request::getInstance()->getSanitizedData()['taskName']];
        Capsule::table('tasks')->insert($data);
        return $this->CRUDpage();

    }

    public function TaskManager()
    {
        $_POST = Request::getInstance()->getSanitizedData();
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == 'add') {
                return $this->createTask();
            }
            if ($_POST['submit'] == 'update') {
                return $this->updateTask();
            }
        }
    }

    public function updateTask()
    {
        Capsule::table('tasks')->where(['id' => $_POST['taskId']])->update(['name' => $_POST['taskName']]);
        return $this->CRUDpage();
    }
}