<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTask extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'task_id',
        'working_time_start',
        'working_time_finish',
        'process_category_id',
        'task_category_id',
        'detail'   
    ];

    public function members()
    {
        return $this->hasMany(Employee::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function processCategory()
    {
        return $this->belongsTo(ProcessCategory::class);
    }

    public function taskCategory()
    {
        return $this->belongsTo(TaskCategory::class);
    }
}
