<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    //
    public function create()
    {
        return view('admin.template.addtemplate');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'zip_file' => 'required|mimes:zip|max:10240',
        // ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $zipFilePath = $request->file('zip_file')->store('templates', 'public');

        $template = Template::create([

            'name' => $request->name,
            'typeservice' => $request->typeservice,
            'description' => $request->description,
            'access_level' => $request->access_level,
            'commerce_mode' => $request->commerce_mode,
            'industrie' => implode(',', $request->input('industrie')),
            'thumbnail' => $thumbnailPath,
            'zip_file' => $zipFilePath,
        ]);

        return redirect()->route('templateslist')->with('success', 'Template uploaded successfully');
    }

    // public function showallTemplate()
    // {
    //     $templates = Template::all();
    //     return view('front_include.choosetemplates');
    // }

    // previsualiser le template

    public function preview(Template $template)
    {
        return view('front_include.preview', compact('template'));
    }

    public function TemplateList()
    {
        $templates = Template::all();
        return view('admin.template.listtemplate',compact('templates'));
    }

}
