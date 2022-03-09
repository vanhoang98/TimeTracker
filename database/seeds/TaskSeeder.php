<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($pj = 1; $pj <= 3; $pj++)
        {
            factory(\App\Models\Task::class, 3)->create([
                'project_id' => $pj,
                'parent_task_id' => null,
            ]);
            for ($pr = 1+($pj-1)*4*3 ; $pr <= ($pj-1)*4*3+3; $pr++)
            {
                factory(\App\Models\Task::class, 3)->create([
                    'project_id' => $pj,
                    'parent_task_id' => $pr,
                ]);
            }
        }
    }
}
