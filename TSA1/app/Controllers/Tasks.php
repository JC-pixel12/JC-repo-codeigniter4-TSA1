<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    public function index()
    {
        $TasksModel = new TasksModel();
        $tasks = $TasksModel->orderBy('task_date', 'DESC')->findAll();
        return view('tasks', ['tasks' => $tasks]);
    }
}