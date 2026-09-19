<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Pages extends BaseController
{
    public function index()
    {
        $TasksModel = new TasksModel();
        $tasks = $TasksModel->where('task_date', date('Y-m-d'))->findAll();
        return view('landing', ['tasks' => $tasks]);
    }

    public function about()
    {
        return view('about');
    }
}
