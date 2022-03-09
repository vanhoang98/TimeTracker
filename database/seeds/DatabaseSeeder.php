<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ProjectSeeder::class);
         $this->call(TaskSeeder::class);
         $this->call(ProcessCategorySeeder::class);
         $this->call(TaskCategorySeeder::class);
         $this->call(EmployeeSeeder::class);
         $this->call(EmployeeProjectSeeder::class);
    }
}
