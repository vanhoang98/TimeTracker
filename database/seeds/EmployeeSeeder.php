<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
