<?php

namespace App\Http\Controllers;

use App\Models\TypeTemplate;
use Illuminate\Http\Request;

class TypetemplateController extends Controller
{

    public function create(){
        return view('admin.Typetemplate.addtypetemplate');
    }
    public function store(Request $request){
        $request->validate([
            'name.*' => 'required|string|max:255',
        ]);
    
        $names = $request->input('name');
    
        foreach ($names as $name) {
            TypeTemplate::create([
                'name' => $name,
            ]);
        }

        return redirect()->route('typetemplatelist')->with('success', 'Template uploaded successfully');
    }

    public function list()
    {
        $typetemplates = TypeTemplate::all();
        return view('admin.Typetemplate.list',compact('typetemplates'));
    }

    public function edit($id)
    {
        $typetemplate = TypeTemplate::findOrFail($id);
        return view('admin.Typetemplate.update',compact('typetemplate'));
    }

    public function update(Request $request,$id)
    {
        $typetemplate = TypeTemplate::findOrFail($id);
        $request->validate([
            'name.*' => 'required|string|max:255',
        ]);
            $typetemplate->update(['name' => $request->input('name')]);

        return redirect()->route('typetemplatelist')->with('success', 'Template updated successfully');
    }


}
