<?php

namespace App\Http\Controllers;

use App\Models\TypeTemplate;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\ProductCategory;
use App\Models\Sectorbusiness;


class TemplateController extends Controller
{
    //view to add a template
    public function create()
    {
        $typetemplates = TypeTemplate::orderBy('name', 'asc')->get();
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        $sectorsbusiness = Sectorbusiness::orderBy('name','asc')->get();
        return view('admin.template.addtemplate', compact('typetemplates', 'productcategorys','sectorsbusiness'));
    }


    // to submit a template
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255|unique:templates,name',
            'typeservice' => 'required|string',
            'description' => 'nullable|string',
            'access_level' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'zip_file' => 'required|mimes:zip|max:10240',
        ]);

        // Traitement des fichiers
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $zipFilePath = $request->file('zip_file')->store('templates', 'public');

        // Créer le nouveau template
        $template = new Template();
        $template->name = $request->name;
        $template->typeservice = $request->typeservice;
        $template->description = $request->description;
        $template->access_level = $request->access_level;
        $template->commerce_mode = $request->commerce_mode;
        $template->createby = $request->createby;
        $template->price = $request->price;
        $template->typetemplate = $request->typetemplate;
        $template->thumbnail = $thumbnailPath;
        $template->zip_file = $zipFilePath;

        // Traiter les champs 'industrie' et 'productcategory'
        $industries = $request->input('industrie');
        $productcategories = $request->input('productcategory');

        if (is_array($industries)) {
            $template->industrie = implode(',', $industries);
        } else {
            $template->industrie = $industries;
        }

        if (is_array($productcategories)) {
            $template->productcategory = implode(',', $productcategories);
        } else {
            $template->productcategory = $productcategories;
        }

        // Sauvegarder le template dans la base de données
        $template->save();

        return redirect()->route('templateslist')->with('success', 'Template uploaded successfully');
    }



    // to show edit page
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        $typetemplates = TypeTemplate::orderBy('name', 'asc')->get();
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        $sectorsbusiness = Sectorbusiness::orderBy('name','asc')->get();
        $selectedCategories = ProductCategory::all();
        return view('admin.template.update', compact('template', 'sectorsbusiness', 'typetemplates', 'productcategorys',));
    }



    // view all detail for each template
    public function view($id)
    {
        $template = Template::findOrFail($id);

        return view('admin.template.view', compact('template'));
    }

    // to modify a template

    public function update(Request $request, $id)
    {

        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255|unique:templates,name',
            'typeservice' => 'required|string',
            'description' => 'nullable|string',
            'access_level' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'zip_file' => 'required|mimes:zip|max:10240',
        ]);

        $template = Template::findOrFail($id);

        $template->typeservice = $request->input('typeservice');
        $template->name = $request->input('name');
        $template->description = $request->input('description');
        $template->access_level = $request->input('access_level');
        $template->commerce_mode = $request->input('commerce_mode');
        $template->createby = $request->input('createby');
        $template->price = $request->input('price');
        $template->typetemplate = $request->input('typetemplate');

        $industries = $request->input('industrie');
        $productcategories = $request->input('productcategory');

        if (is_array($industries)) {
            $template->industrie = implode(',', $industries);
        } else {
            $template->industrie = $industries;
        }

        if (is_array($productcategories)) {
            $template->productcategory = implode(',', $productcategories);
        } else {
            $template->productcategory = $productcategories;
        }


        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $template->thumbnail = $thumbnailPath;
        }

        if ($request->hasFile('zip_file')) {
            $zipPath = $request->file('zip_file')->store('templates', 'public');
            $template->zip_file = $zipPath;
        }

        $template->save();

        return redirect()->route('templateslist')->with('success', 'Template updated successfully');

    }


    // public function showallTemplate()
    // {
    //     $templates = Template::all();
    //     return view('front_include.choosetemplates');
    // }


    // previsualiser le template
    // for a preview of a templates who you selected
    public function preview(Template $template)
    {
        return view('front_include.preview', compact('template'));
    }


    // list of all template
    public function TemplateList()
    {
        $templates = Template::all();
        return view('admin.template.listtemplate', compact('templates'));
    }

    // delete
    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        $template->delete();
        return redirect()->route('templateslist')->with('success', 'Template deleted successfully.');
    }

}
