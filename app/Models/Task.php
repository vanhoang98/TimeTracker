<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'name',
        'parent_task_id',
        'number_item',
        'status',
        'leader',
        'start_date',
        'finish_date',
        'work_in_time',
        'actual_work_in_time',
        'progress',
        'description'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    //many-to-many relationship
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_task','task_id','employee_id')
            ->withPivot('working_time_start', 'working_time_finish','detail');
    }

//    public function parentTask()
//    {
//        return $this->belongsTo(Task::class, 'parent_task_id');
//    }
//
//    public function subTasks()
//    {
//        return $this->hasMany(Task::class, 'parent_task_id');
//    }
}
