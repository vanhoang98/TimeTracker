<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = array('調査', '定義', '設計', '開発', '検証', 'リリース');
        $leaders = array('Hai Anh', 'Tue Anh', 'Hoang');
        $start = Carbon::now();
        $end = Carbon::now()->addDays(21);
//        for ($pj = 1; $pj <= 3; $pj++)
//        {
//            factory(\App\Models\Task::class, 3)->create([
//                'project_id' => $pj,
//                'parent_task_id' => null,
//            ]);
//            for ($pr = 1+($pj-1)*4*3 ; $pr <= ($pj-1)*4*3+3; $pr++)
//            {
//                factory(\App\Models\Task::class, 3)->create([
//                    'project_id' => $pj,
//                    'parent_task_id' => $pr,
//                ]);
//            }
//        }
        //project 1 seed
        \App\Models\Task::create(
            [
                'project_id' => 1,
                'name' => 'Sub Task',
                'number_item' => 1,
                'status' => 1,
                'leader' => $leaders[array_rand($leaders)],
                'start_date' => $start,
                'finish_date' => $end,
                'work_in_time' => 2,
                'actual_work_in_time' => 0,
                'progress' => 0,
                'description' => "",
                'children' => [
                    [
                        'project_id' => 1,
                        'name' => 'Sub Sub Task',
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                        'children' => [
                            [
                                'project_id' => 1,
                                'name' => $tasks[array_rand($tasks)],
                                'number_item' => 1,
                                'status' => 1,
                                'leader' => $leaders[array_rand($leaders)],
                                'start_date' => $start,
                                'finish_date' => $end,
                                'work_in_time' => 2,
                                'actual_work_in_time' => 0,
                                'progress' => 0,
                                'description' => "",
                            ]

                        ]
                    ],
                    [
                        'project_id' => 1,
                        'name' => $tasks[array_rand($tasks)],
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                    ],
                    [
                        'project_id' => 1,
                        'name' => $tasks[array_rand($tasks)],
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                    ]

                ]
            ]);
        \App\Models\Task::create(
            [
                'project_id' => 1,
                'name' => 'Sub Task',
                'number_item' => 1,
                'status' => 1,
                'leader' => $leaders[array_rand($leaders)],
                'start_date' => $start,
                'finish_date' => $end,
                'work_in_time' => 2,
                'actual_work_in_time' => 0,
                'progress' => 0,
                'description' => "",
                'children' => [
                    [
                        'project_id' => 1,
                        'name' => 'Sub Sub Task',
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                        'children' => [
                            [
                                'project_id' => 1,
                                'name' => $tasks[array_rand($tasks)],
                                'number_item' => 1,
                                'status' => 1,
                                'leader' => $leaders[array_rand($leaders)],
                                'start_date' => $start,
                                'finish_date' => $end,
                                'work_in_time' => 2,
                                'actual_work_in_time' => 0,
                                'progress' => 0,
                                'description' => "",
                            ]

                        ]
                    ],
                ]
            ]
        );

        //project 2 seed
        \App\Models\Task::create(
            [
                'project_id' => 2,
                'name' => 'Sub Task',
                'number_item' => 1,
                'status' => 1,
                'leader' => $leaders[array_rand($leaders)],
                'start_date' => $start,
                'finish_date' => $end,
                'work_in_time' => 2,
                'actual_work_in_time' => 0,
                'progress' => 0,
                'description' => "",
                'children' => [
                    [
                        'project_id' => 2,
                        'name' => 'Sub Sub Task',
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                        'children' => [
                            [
                                'project_id' => 2,
                                'name' => $tasks[array_rand($tasks)],
                                'number_item' => 1,
                                'status' => 1,
                                'leader' => $leaders[array_rand($leaders)],
                                'start_date' => $start,
                                'finish_date' => $end,
                                'work_in_time' => 2,
                                'actual_work_in_time' => 0,
                                'progress' => 0,
                                'description' => "",
                            ]

                        ]
                    ],
                    [
                        'project_id' => 2,
                        'name' => $tasks[array_rand($tasks)],
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                    ],
                    [
                        'project_id' => 2,
                        'name' => $tasks[array_rand($tasks)],
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                    ]

                ]
            ]);

        //project 3 seed
        \App\Models\Task::create(
            [
                'project_id' => 3,
                'name' => 'Sub Task',
                'number_item' => 1,
                'status' => 1,
                'leader' => $leaders[array_rand($leaders)],
                'start_date' => $start,
                'finish_date' => $end,
                'work_in_time' => 2,
                'actual_work_in_time' => 0,
                'progress' => 0,
                'description' => "",
                'children' => [
                    [
                        'project_id' => 3,
                        'name' => 'Sub Sub Task',
                        'number_item' => 1,
                        'status' => 1,
                        'leader' => $leaders[array_rand($leaders)],
                        'start_date' => $start,
                        'finish_date' => $end,
                        'work_in_time' => 2,
                        'actual_work_in_time' => 0,
                        'progress' => 0,
                        'description' => "",
                        'children' => [
                            [
                                'project_id' => 3,
                                'name' => $tasks[array_rand($tasks)],
                                'number_item' => 1,
                                'status' => 1,
                                'leader' => $leaders[array_rand($leaders)],
                                'start_date' => $start,
                                'finish_date' => $end,
                                'work_in_time' => 2,
                                'actual_work_in_time' => 0,
                                'progress' => 0,
                                'description' => "",
                            ]

                        ]
                    ],
                ]
            ]
        );
    }
}
