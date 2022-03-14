<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeInterestedTask extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'task_id',
    ];

    public function members()
    {
        return $this->hasMany(Employee::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
