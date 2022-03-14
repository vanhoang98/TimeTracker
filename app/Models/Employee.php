<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'role_id',
        'date_of_birth',
        'sex',
        'address',
        'department',
        'breaktime_start',
        'breaktime_finsh'
    ];

    protected $hidden = [
        'password'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'employee_task','employee_id','task_id')
            ->withPivot('id', 'working_time_start', 'working_time_finish','detail');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function interestedTasks()
    {
        return $this->belongsToMany(Task::class, 'employee_interested_tasks','employee_id','task_id');
    }
}
