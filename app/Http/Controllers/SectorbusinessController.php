<?php

namespace App\Http\Controllers;

use App\Models\Sectorbusiness;
use Illuminate\Http\Request;

class SectorbusinessController extends Controller
{
    //
    public function create(){
        return view('admin.Sectorbusiness.add');
    }
    
    public function store(Request $request){
        $request->validate([
            'name.*' => 'required|string|max:255',
        ]);
    
        $names = $request->input('name');
    
        foreach ($names as $name) {
            Sectorbusiness::create([
                'name' => $name,
            ]);
        }

        return redirect()->route('sectorbusinesslist')->with('success', 'Template uploaded successfully');
    }

    public function list()
    {
        $sectorsbusiness = Sectorbusiness::all();
        return view('admin.Sectorbusiness.list',compact('sectorsbusiness'));
    }

    public function edit($id)
    {
        $sectorbusiness = Sectorbusiness::findOrFail($id);
        return view('admin.Sectorbusiness.update',compact('sectorbusiness'));
    }

    public function update(Request $request,$id)
    {
        $sectorbusiness = Sectorbusiness::findOrFail($id);
        $request->validate([
            'name.*' => 'required|string|max:255',
        ]);
            $sectorbusiness->update(['name' => $request->input('name')]);

        return redirect()->route('sectorbusinesslist')->with('success', 'Template updated successfully');
    }
}
