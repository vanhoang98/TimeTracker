<?php

use Illuminate\Database\Seeder;

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
            $faker = Faker\Factory::create();
            $start = $faker->dateTimeBetween('now', 'now +2 days');
            $end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 hours');
            for ($i= 1; $i <=5; $i++){
                $employee->tasks()->attach($i, [
                    'working_time_start' => $start,
                    'working_time_finish' =>$end,
                    'process_category_id' => 1,
                    'task_category_id' => 1,
                    'detail' => $faker->text,
                ]);
            }
        });
    }
}
