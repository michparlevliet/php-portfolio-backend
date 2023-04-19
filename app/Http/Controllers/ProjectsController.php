<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Project;
use App\Models\Type;
use App\Models\ProjectSkill;
use App\Models\Skill;


class ProjectsController extends Controller
{

    public function list()
    {
        
        return view('projects.list', [
            'projects' => Project::all()
           
        ]);

    }

    public function addForm()
    {
        return view('projects.add', [
            'types' => Type::all(),
            'skills' => Skill::all()
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            // 'slug' => 'required|unique:projects|regex:/^[A-z\-]+$/',
            'url' => 'nullable|url',
            'content' => 'required',
            'type_id' => 'required', 
            'skills' => 'nullable',
        ]);

        $project = new Project();
        $project->title = $attributes['title'];
        $project->slug = $attributes['slug'];
        $project->url = $attributes['url'];
        $project->content = $attributes['content'];
        $project->type_id = $attributes['type_id'];
        // $project->skill_id = $attributes['skill_id'];
        $project->user_id = Auth::user()->id;
        $project->save();

        if(isset($attributes['skills']))
        {
            foreach($attributes['skills'] as $skill)
            {
                $project->projectSkills()->attach($skill);
            }
        }

        return redirect('/console/projects/list')
            ->with('message', 'Project has been added!');
    }

    public function editForm(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'types' => Type::all(),
            'skills' => Skill::all()
        ]);
    }

    public function edit(Project $project)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            // 'slug' => [
            //     'required',
            //     Rule::unique('projects')->ignore($project->id),
            //     'regex:/^[A-z\-]+$/',
            // ],
            'url' => 'nullable|url',
            'content' => 'required',
            'type_id' => 'required',
            'skills' => 'nullable',
        ]);

        $project->title = $attributes['title'];
        $project->slug = $attributes['slug'];
        $project->url = $attributes['url'];
        $project->content = $attributes['content'];
        $project->type_id = $attributes['type_id'];
        // $project->skill_id = $attributes['skill_id'];
        $project->save();

        $project->projectSkills()->sync($attributes['skills']);

        /*
        if(isset($attributes['skills']))
        {
            foreach($attributes['skills'] as $skill)
            {
                $project->projectSkills()->attach($skill);
            }
        }
        */

        return redirect('/console/projects/list')
            ->with('message', 'Project has been edited!');
    }

    public function delete(Project $project)
    {

        if($project->image)
        {
            Storage::delete($project->image);
        }
        
        $project->delete();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project has been deleted!');        
    }

    public function imageForm(Project $project)
    {
        return view('projects.image', [
            'project' => $project,
        ]);
    }

    public function image(Project $project)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($project->image)
        {
            Storage::delete($project->image);
        }
        
        $path = request()->file('image')->store('projects');

        $project->image = $path;
        $project->save();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project image has been edited!');
    }
    
}
