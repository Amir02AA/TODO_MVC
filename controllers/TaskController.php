<?php

namespace controllers;

use core\Render;
use core\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class TaskController
{
    public function showTasks()
    {
        $totalTasks = Capsule::table('tasks')->select()->get()->toArray();
        $data = Request::getInstance()->getSanitizedData();
        if (isset($data['delete'])) {
            return $this->deleteTask();
        }
        return Render::renderURI('tasks', params: ['tasks' => $totalTasks]);
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
        $data = Request::getInstance()->getSanitizedData();
        if (isset($data['submit'])) {
            if ($data['submit'] == 'add') {
                return $this->createTask();
            }
            if ($data['submit'] == 'update') {
                return $this->updateTask();
            }
        }
    }

    public function updateTask()
    {
        $_POST = Request::getInstance()->getSanitizedData();
        Capsule::table('tasks')->where(['id' => $_POST['taskId']])->update(['name' => $_POST['taskName']]);
        return $this->CRUDpage();
    }

    public function deleteTask()
    {
        $data = Request::getInstance()->getSanitizedData();
        Capsule::table('tasks')->delete($data['delete']);
        header("location:/tasks");
        return true;
    }
}