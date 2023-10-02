<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TaskController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Task'
        ];
        return view('task', $data);
    }
}
