<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basic_projects = Project::all();
        $basic_tasks = [
            '企画・事業部相談 (自席)', 
            '会議', 
            '調査・分析',
            '要件承認',
            '要件定義 (業務・システム)',
            '設計書作成 (概要・詳細)',
            '設計書レビュー',
            'PG作成 (コーディング)',
            'テスト仕様書作成',
            'テストレビュー',
            'テスト (単体・結合・総合)',
            'リリース判定基準・リリース確認',
            'リリース作業',
            '保守・運用',
            '障害対応',
            '問合せ作業',
            '見積依頼・確認',
            '経理事務 (稟議・契約・支払)',
            '資料作成',
        ];
        $other_tasks = [
            '休憩', 
            '社外受注作業', 
            '店舗支援 (タスク)',
            '休み',
            '出張 (移動時間)',
        ];
        $leaders = [
            'Hai Anh', 
            'Tue Anh', 
            'Hoang',
        ];
        $start = Carbon::now();
        $end = Carbon::now()->addDays(21);

        for ($i = 1; $i < $basic_projects->count(); $i++) {
            for ($j = 0; $j < count($basic_tasks); $j++) {
                DB::table('tasks')->insert([
                    'project_id' => $i,
                    'name' => $basic_tasks[$j],
                    'number_item' => 1,
                    'status' => 1,
                    'leader' => $leaders[array_rand($leaders)],
                    'start_date' => $start,
                    'finish_date' => $end,
                    'work_in_time' => 2,
                    'actual_work_in_time' => 0,
                    'progress' => 0,
                    'description' => "",
                ]); 
            }
        }

        for ($j = 0; $j < count($other_tasks); $j++) {
            DB::table('tasks')->insert([
                'project_id' => $basic_projects->count(),
                'name' => $other_tasks[$j],
                'number_item' => 1,
                'status' => 1,
                'leader' => $leaders[array_rand($leaders)],
                'start_date' => $start,
                'finish_date' => $end,
                'work_in_time' => 2,
                'actual_work_in_time' => 0,
                'progress' => 0,
                'description' => "",
            ]); 
        }
        // $tasks = array('調査', '定義', '設計', '開発', '検証', 'リリース');
        // $leaders = array('Hai Anh', 'Tue Anh', 'Hoang');
        // $start = Carbon::now();
        // $end = Carbon::now()->addDays(21);

        // \App\Models\Task::create(
        //     [
        //         'project_id' => 1,
        //         'name' => 'Sub Task',
        //         'number_item' => 1,
        //         'status' => 1,
        //         'leader' => $leaders[array_rand($leaders)],
        //         'start_date' => $start,
        //         'finish_date' => $end,
        //         'work_in_time' => 2,
        //         'actual_work_in_time' => 0,
        //         'progress' => 0,
        //         'description' => "",
        //         'children' => [
        //             [
        //                 'project_id' => 1,
        //                 'name' => 'Sub Sub Task',
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //                 'children' => [
        //                     [
        //                         'project_id' => 1,
        //                         'name' => $tasks[array_rand($tasks)],
        //                         'number_item' => 1,
        //                         'status' => 1,
        //                         'leader' => $leaders[array_rand($leaders)],
        //                         'start_date' => $start,
        //                         'finish_date' => $end,
        //                         'work_in_time' => 2,
        //                         'actual_work_in_time' => 0,
        //                         'progress' => 0,
        //                         'description' => "",
        //                     ]

        //                 ]
        //             ],
        //             [
        //                 'project_id' => 1,
        //                 'name' => $tasks[array_rand($tasks)],
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //             ],
        //             [
        //                 'project_id' => 1,
        //                 'name' => $tasks[array_rand($tasks)],
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //             ]

        //         ]
        //     ]);
        // \App\Models\Task::create(
        //     [
        //         'project_id' => 1,
        //         'name' => 'Sub Task',
        //         'number_item' => 1,
        //         'status' => 1,
        //         'leader' => $leaders[array_rand($leaders)],
        //         'start_date' => $start,
        //         'finish_date' => $end,
        //         'work_in_time' => 2,
        //         'actual_work_in_time' => 0,
        //         'progress' => 0,
        //         'description' => "",
        //         'children' => [
        //             [
        //                 'project_id' => 1,
        //                 'name' => 'Sub Sub Task',
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //                 'children' => [
        //                     [
        //                         'project_id' => 1,
        //                         'name' => $tasks[array_rand($tasks)],
        //                         'number_item' => 1,
        //                         'status' => 1,
        //                         'leader' => $leaders[array_rand($leaders)],
        //                         'start_date' => $start,
        //                         'finish_date' => $end,
        //                         'work_in_time' => 2,
        //                         'actual_work_in_time' => 0,
        //                         'progress' => 0,
        //                         'description' => "",
        //                     ]

        //                 ]
        //             ],
        //         ]
        //     ]
        // );

        // //project 2 seed
        // \App\Models\Task::create(
        //     [
        //         'project_id' => 2,
        //         'name' => 'Sub Task',
        //         'number_item' => 1,
        //         'status' => 1,
        //         'leader' => $leaders[array_rand($leaders)],
        //         'start_date' => $start,
        //         'finish_date' => $end,
        //         'work_in_time' => 2,
        //         'actual_work_in_time' => 0,
        //         'progress' => 0,
        //         'description' => "",
        //         'children' => [
        //             [
        //                 'project_id' => 2,
        //                 'name' => 'Sub Sub Task',
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //                 'children' => [
        //                     [
        //                         'project_id' => 2,
        //                         'name' => $tasks[array_rand($tasks)],
        //                         'number_item' => 1,
        //                         'status' => 1,
        //                         'leader' => $leaders[array_rand($leaders)],
        //                         'start_date' => $start,
        //                         'finish_date' => $end,
        //                         'work_in_time' => 2,
        //                         'actual_work_in_time' => 0,
        //                         'progress' => 0,
        //                         'description' => "",
        //                     ]

        //                 ]
        //             ],
        //             [
        //                 'project_id' => 2,
        //                 'name' => $tasks[array_rand($tasks)],
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //             ],
        //             [
        //                 'project_id' => 2,
        //                 'name' => $tasks[array_rand($tasks)],
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //             ]

        //         ]
        //     ]);

        // //project 3 seed
        // \App\Models\Task::create(
        //     [
        //         'project_id' => 3,
        //         'name' => 'Sub Task',
        //         'number_item' => 1,
        //         'status' => 1,
        //         'leader' => $leaders[array_rand($leaders)],
        //         'start_date' => $start,
        //         'finish_date' => $end,
        //         'work_in_time' => 2,
        //         'actual_work_in_time' => 0,
        //         'progress' => 0,
        //         'description' => "",
        //         'children' => [
        //             [
        //                 'project_id' => 3,
        //                 'name' => 'Sub Sub Task',
        //                 'number_item' => 1,
        //                 'status' => 1,
        //                 'leader' => $leaders[array_rand($leaders)],
        //                 'start_date' => $start,
        //                 'finish_date' => $end,
        //                 'work_in_time' => 2,
        //                 'actual_work_in_time' => 0,
        //                 'progress' => 0,
        //                 'description' => "",
        //                 'children' => [
        //                     [
        //                         'project_id' => 3,
        //                         'name' => $tasks[array_rand($tasks)],
        //                         'number_item' => 1,
        //                         'status' => 1,
        //                         'leader' => $leaders[array_rand($leaders)],
        //                         'start_date' => $start,
        //                         'finish_date' => $end,
        //                         'work_in_time' => 2,
        //                         'actual_work_in_time' => 0,
        //                         'progress' => 0,
        //                         'description' => "",
        //                     ]

        //                 ]
        //             ],
        //         ]
        //     ]
        // );
    }
}
