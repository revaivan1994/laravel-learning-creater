<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Project::factory(5)->create()->each(function ($project) {
            $project->tasks()->saveMany(\App\Models\Task::factory(10)->make());
        });
    }
}
