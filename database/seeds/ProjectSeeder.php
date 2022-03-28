<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managers = [
            '鈴木', 
            '武内', 
            '齋藤', 
            '元嶋'
        ];
        $organizations = [
            'オフショア開発', 
            'エンタメ開発', 
            'DX推進'
        ];
        $projects = [
            [
                'code' => 501191,
                'name' => '【配賦対象】おしごと発見',
            ],
            [
                'code' => 501140,
                'name' => '【配賦対象】UX',
            ],
            [
                'code' => 501090,
                'name' => '【配賦対象】TOG',
            ],
            [
                'code' => 501096,
                'name' => '【配賦対象】HiMO',
            ],
            [
                'code' => 501096,
                'name' => '【配賦対象】T-Auth',
            ],
            [
                'code' => 501095,
                'name' => '【配賦対象】TOL (販促)',
            ],
            [
                'code' => 501094,
                'name' => '【配賦対象】NET TSUTAYA (UX)',
            ],
            [
                'code' => 501094,
                'name' => '【配賦対象】TOL (アプリ)',
            ],
            [
                'code' => 501050,
                'name' => '【配賦対象】MUSIC',
            ],
            [
                'code' => 501046,
                'name' => '【配賦対象】EC',
            ],
            [
                'code' => 501045,
                'name' => '【配賦対象】TTV',
            ],
            [
                'code' => 501044,
                'name' => '【配賦対象】DISCAS',
            ],
            [
                'code' => 40374,
                'name' => '【配賦対象】FINE',
            ],
            [
                'code' => 100004,
                'name' => '【配賦対象】TOL (ストア)',
            ],
            [
                'code' => 100003,
                'name' => '【配賦対象】OMO・DX本部',
            ],
            [
                'code' => 100002,
                'name' => '【配賦対象】店舗DX',
            ],
            [
                'code' => 100001,
                'name' => '【配賦対象】NET TSUTAYA (DX)',
            ],
            [
                'code' => 000000,
                'name' => '【全体】共通',
            ],
        ];
        $start = Carbon::now();
        $end = Carbon::now()->addDays(21);

        for ($i = 0; $i < count($projects); $i++) {
            DB::table('projects')->insert([
                'code' => $projects[$i]['code'],
                'name' => $projects[$i]['name'],
                'manager' => $managers[array_rand($managers)],
                'organization' => $organizations[array_rand($organizations)],
                'start_date' => $start,
                'finish_date' => $end,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }
    }
}
