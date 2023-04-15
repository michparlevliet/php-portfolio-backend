<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;

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

        User::truncate();
        Type::truncate();
        Project::truncate();
        Skill::truncate(); 
        // Experience::truncate(); 
        

        
        User::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        Skill::factory()->count(4)->create();
        // Project::factory()->count(4)->create();
        Project::factory()->count(4)->create()->each(function($project){
            $skills = Skill::all()->random(rand(1,2) )->pluck('id');
            $project->projectSkills()->attach($skills);
        });

        // Experience::factory()->count(4)->create();
        Experience::factory()->count(4)->create()->each(function($experience){
            $skills = Skill::all()->random(rand(1,2) )->pluck('id');
            $experience->experienceSkills()->attach($skills);
        });
            
    }
}
