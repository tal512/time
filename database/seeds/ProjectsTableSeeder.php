<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Project::class, 100)->create();
    }
}
