<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntriesController extends Controller
{
    public function list()
    {
        return view('entries.list', [
            'entries' => Entry::all()
        ]);
    }

    public function addForm()
    {
        return view('entries.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required'
        ]);

        $entry = new Entry();
        $entry->title = $attributes['title'];
        $project->content = $attributes['content'];
        $entry->learned_at = $attributes['learned_at'];
        // $project->user_id = Auth::user()->id;
        $entry->save();

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been added!');
    }

    public function editForm(Entry $entry)
    {
        return view('entries.edit', [
            'entry' => $entry
        ]);
    }

    public function edit(Entry $entry)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required'
        ]);

        $entry->title = $attributes['title'];
        $entry->content = $attributes['content'];
        $entry->learned_at = $attributes['learned_at'];
        $entry->save();

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been edited!');
    }

    public function delete(Entry $entry)
    {
        
        $entry->delete();
        
        return redirect('/console/entries/list')
            ->with('message', 'Entry has been deleted!');        
    }
}
