<?php

use Illuminate\Database\Seeder;

class ProcessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('process_categories')->insert([
                'name' => '新規',
                'description' => 'null'
            ]);
    }
}
