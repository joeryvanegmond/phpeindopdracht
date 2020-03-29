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
         $this->call(TagsTableSeeder::class);
         $this->call(CourseTableSeeder::class);
//         $this->call(TeacherTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(UserTableSeeder::class);
    }
}
