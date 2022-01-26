<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'       
    ];

    public function employeeTasks()
    {
        return $this->hasMany(EmployeeTask::class);
    }
}
