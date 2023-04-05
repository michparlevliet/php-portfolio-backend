<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Type;

class TypesController extends Controller
{

    public function list()
    {
        return view('types.list', [
            'types' => Type::all()
        ]);
    }

    public function addForm()
    {

        return view('types.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $type = new Type();
        $type->title = $attributes['title'];
        $type->save();

        return redirect('/console/types/list')
            ->with('message', 'Type has been added!');
    }

    public function editForm(Type $type)
    {
        return view('types.edit', [
            'type' => $type,
        ]);
    }

    public function edit(Type $type)
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $type->title = $attributes['title'];
        $type->save();

        return redirect('/console/types/list')
            ->with('message', 'Type has been edited!');
    }

    public function delete(Type $type)
    {
        $type->delete();
        
        return redirect('/console/types/list')
            ->with('message', 'Type has been deleted!');        
    }

}
