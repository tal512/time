<?php

use App\Models\Project;
use App\Models\Time;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TimesTableSeeder extends Seeder
{
    public function run()
    {
        $projects = Project::select('id', 'start_at', 'end_at')->get();
        $users = User::select('id')->get();
        $now = new Carbon();

        foreach ($projects as $project) {
            if ($project->start_at->greaterThan($now)) {
                continue;
            }

            if ($project->end_at->greaterThan($now)) {
                $project->end_at = $now;
            }

            foreach ($users as $user) {
                if (rand(0, 99) < 10) {
                    $this->seedTimes($project, $user);
                }
            }
        }
    }

    protected function seedTimes($project, $user)
    {
        $numberOfTimes = rand(1, 20);
        $differenceInDays = $project->start_at->diffInDays($project->end_at);
        $seedDays = [];

        for ($i = 0; $i < $numberOfTimes; ++$i) {
            $randomDay = rand(0, $differenceInDays);
            $day = $project->start_at->addDays($randomDay);
            $seedDays[$day->format('Y-m-d')] = [
                'startAt' => $day->format('Y-m-d 08:00:00'),
                'endAt' => $day->format('Y-m-d 16:00:00'),
            ];
        }

        foreach ($seedDays as $seedDay) {
            $time = new Time();
            $time->project_id = $project->id;
            $time->user_id = $user->id;
            $time->start_at = $seedDay['startAt'];
            $time->end_at = $seedDay['endAt'];
            $time->save();
        }
    }
}
