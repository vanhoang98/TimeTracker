<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TimeSheetController extends Controller
{
    public function index()
    {
        $taskTree =  $this->getTaskTree();
        return view('frontend.layouts.master', compact('taskTree'));
    }

    public function getTaskTree()
    {
        $projects = Employee::find(1)->projects;
        $projects->map(function ($project){
            $project['children_tasks'] = $project->getTaskTree();
        });
        return $projects;

    }
}
