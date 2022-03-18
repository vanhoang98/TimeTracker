<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function GuzzleHttp\Promise\task;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'manager',
        'organization',
        'start_date',
        'finish_date',
        'status'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getTaskTree()
    {
//        $tasks = $this->tasks()->whereNull('pare
//]nt_task_id')
//            ->with('childrenTasks')->get();
//        return $tasks;
        $tasks = $this->tasks()->get()->toTree();
        return $tasks;
    }

//    public function employees()
//    {
//        return $this->belongsToMany(Employee::class);
//    }
}
