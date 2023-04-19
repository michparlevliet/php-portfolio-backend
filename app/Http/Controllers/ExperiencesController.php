<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\ExperienceSkill;
use App\Models\Skill;

class ExperiencesController extends Controller
{
    public function list()
    {
        $skill = Skill::find(1);

        foreach ($skill->experiences as $experience) {
            return view('experiences.list', [
                'experiences' => Experience::all(),
                'skills'=> Skill::all()
            ]);
        }
    }

    public function addForm()
    {
        return view('experiences.add', [
            'skills' => Skill::all()
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required',
            'ended_at' => 'required',
            'skills' => 'nullable',
        ]);

        $experience = new Experience();
        $experience->title = $attributes['title'];
        $experience->content = $attributes['content'];
        $experience->learned_at = $attributes['learned_at'];
        $experience->ended_at = $attributes['ended_at'];
        $experience->save();

        if(isset($attributes['skills']))
        {
            foreach($attributes['skills'] as $skill)
            {
                $experience->experienceSkills()->attach($skill);
            }
        }

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been added!');
    }

    public function editForm(Experience $experience)
    {
        return view('experiences.edit', [
            'experience' => $experience
        ]);
    }

    public function edit(Experience $experience)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required',
            'ended_at' => 'required',
            'skills' => 'nullable',
        ]);

        $experience->title = $attributes['title'];
        $experience->content = $attributes['content'];
        $experience->learned_at = $attributes['learned_at'];
        $experience->ended_at = $attributes['ended_at'];
        $experience->save();

        if(isset($attributes['skills']))
        {
            foreach($attributes['skills'] as $skill)
            {
                $experience->experienceSkills()->attach($skill);
            }
        }

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been edited!');
    }

    public function delete(Experience $experience)
    {
        
        $experience->delete();
        
        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been deleted!');        
    }
}
