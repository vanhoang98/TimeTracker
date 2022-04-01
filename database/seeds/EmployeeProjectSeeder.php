<?php

use Illuminate\Database\Seeder;

class EmployeeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = \App\Models\Employee::find(1);
        for ($i = 1; $i <= 18; $i++){
            $employee->projects()->attach($i);
        }
        $employee = \App\Models\Employee::find(2);
        $employee->projects()->attach(1);
//        $employee->projects()->attach(2);
        $employee->projects()->attach(3);
        $employee = \App\Models\Employee::find(3);
        $employee->projects()->attach(1);
        $employee->projects()->attach(2);
//        $employee->projects()->attach(3);
        $employee = \App\Models\Employee::find(4);
//        $employee->projects()->attach(1);
        $employee->projects()->attach(2);
        $employee->projects()->attach(3);
    }
}
