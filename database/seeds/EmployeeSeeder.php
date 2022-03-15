<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Employee::create([
            'name' => 'CCC TEST',
            'email' => 'ccctest@ccc.jp',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'date_of_birth' => Carbon::now(),
            'sex' => 1,
            'address' => 'JP',
            'department' => "TSUTAYA IT",
            'breaktime_start' => Carbon::now(),
            'breaktime_finish' => Carbon::now()
        ]);
        factory(\App\Models\Employee::class, 5)->create()
        ->each(function ($employee){
            for ($i= 1; $i <=5; $i++){
                $day_offset = rand(-1,2);
                $hour_offset = rand(1,8);
                $start = Carbon::tomorrow()->addDay($day_offset)->addHour($hour_offset);
                $end = Carbon::tomorrow()->addDay($day_offset)->addHour($hour_offset+1);
                $employee->tasks()->attach($i, [
                    'working_time_start' => $start,
                    'working_time_finish' =>$end,
                    'process_category_id' => 1,
                    'task_category_id' => 1,
                    'detail' => "",
                ]);
            }
        });
    }
}
