<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->tasksModel = new TasksModel();
    }

    public function index()
    {
        $data['tasks'] = $this->tasksModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/tasks', $data);
    }

    // New Task form
    public function new()
    {
        return view('tasks/new');
    }

    // Save new task
    public function create()
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') ?? 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    // Edit form
    public function edit($id)
    {
        $task = $this->taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    // Update task
    public function update($id)
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $task = $this->taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $this->taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    // Soft delete / archive
    public function delete($id)
    {
        $task = $this->taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $this->taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}