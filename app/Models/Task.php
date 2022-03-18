<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Task extends Model
{
    use SoftDeletes;
    use NodeTrait;

    protected $fillable = [
        'project_id',
        'name',
        'parent_id',
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

//    public function tasks()
//    {
//        return $this->hasMany(Task::class,'parent_task_id');
//    }

//    public function childrenTasks()
//    {
//        return $this->hasMany(Task::class,'parent_task_id')->with('tasks');
//    }

}
