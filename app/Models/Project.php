<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

//    public function employees()
//    {
//        return $this->belongsToMany(Employee::class);
//    }
}
