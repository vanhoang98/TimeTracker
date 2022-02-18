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
        $employee->projects()->attach(1);
        $employee->projects()->attach(2);
        $employee->projects()->attach(3);
    }
}
