<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Template;
use App\Models\TypeTemplate;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;


class TemplateController extends Controller
{
    //view to add a template
    public function create()
    {
        $typetemplates = TypeTemplate::orderBy('name', 'asc')->get();
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        return view('admin.template.addtemplate', compact('typetemplates', 'productcategorys'));
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
    
        // Dézippage du fichier et extraction du contenu souhaité
        $zip = new ZipArchive;
        $zipPath = storage_path('app/public/') . $zipFilePath;
        $extractPath = storage_path('app/public/extracted/') . $template->id;
    
        if ($zip->open($zipPath) === TRUE) {
            // Parcourir les fichiers du ZIP pour trouver le dossier contenant index.html
            $targetFolder = null;
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $fileInfo = $zip->statIndex($i);
                if (basename($fileInfo['name']) == 'index.html') {
                    $targetFolder = dirname($fileInfo['name']);
                    break;
                }
            }
    
            if ($targetFolder) {
                // Créer le dossier d'extraction
                if (!File::exists($extractPath)) {
                    File::makeDirectory($extractPath, 0755, true);
                }
    
                // Extraire uniquement le dossier contenant index.html et ses sous-dossiers immédiats
                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $fileInfo = $zip->statIndex($i);
                    if (strpos($fileInfo['name'], $targetFolder) === 0) {
                        $relativePath = substr($fileInfo['name'], strlen($targetFolder) + 1);
                        $fullPath = $extractPath . '/' . $relativePath;
    
                        if (substr($fileInfo['name'], -1) == '/') {
                            if (!File::exists($fullPath)) {
                                File::makeDirectory($fullPath, 0755, true);
                            }
                        } else {
                            if (!File::exists(dirname($fullPath))) {
                                File::makeDirectory(dirname($fullPath), 0755, true);
                            }
                            copy("zip://$zipPath#" . $fileInfo['name'], $fullPath);
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error', 'index.html non trouvé.');
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Échec de l\'ouverture du fichier ZIP.');
        }
    
        // Supprimer le fichier ZIP téléchargé si vous le souhaitez
        // File::delete($zipPath);
    
        return redirect()->route('templateslist')->with('success', 'Template uploaded and extracted successfully');
    }
    



    // to show edit page
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        $typetemplates = TypeTemplate::orderBy('name', 'asc')->get();
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        $selectedIndustries = explode(',', $template->industrie);

        return view('admin.template.update', compact('template', 'selectedIndustries', 'typetemplates', 'productcategorys'));
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
            'name' => 'required|string|max:255|unique:templates,name,' . $id,
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
    
            // Dézippage du fichier et extraction du contenu souhaité
            $zip = new ZipArchive;
            $zipPathFull = storage_path('app/public/') . $zipPath;
            $extractPath = storage_path('app/public/extracted/') . $template->id;
    
            if ($zip->open($zipPathFull) === TRUE) {
                // Parcourir les fichiers du ZIP pour trouver le dossier contenant index.html
                $targetFolder = null;
                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $fileInfo = $zip->statIndex($i);
                    if (basename($fileInfo['name']) == 'index.html') {
                        $targetFolder = dirname($fileInfo['name']);
                        break;
                    }
                }
    
                if ($targetFolder) {
                    // Créer le dossier d'extraction
                    if (!File::exists($extractPath)) {
                        File::makeDirectory($extractPath, 0755, true);
                    }
    
                    // Extraire uniquement le dossier contenant index.html et ses sous-dossiers immédiats
                    for ($i = 0; $i < $zip->numFiles; $i++) {
                        $fileInfo = $zip->statIndex($i);
                        if (strpos($fileInfo['name'], $targetFolder) === 0) {
                            $relativePath = substr($fileInfo['name'], strlen($targetFolder) + 1);
                            $fullPath = $extractPath . '/' . $relativePath;
    
                            if (substr($fileInfo['name'], -1) == '/') {
                                if (!File::exists($fullPath)) {
                                    File::makeDirectory($fullPath, 0755, true);
                                }
                            } else {
                                if (!File::exists(dirname($fullPath))) {
                                    File::makeDirectory(dirname($fullPath), 0755, true);
                                }
                                copy("zip://$zipPathFull#" . $fileInfo['name'], $fullPath);
                            }
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'index.html non trouvé.');
                }
                $zip->close();
            } else {
                return redirect()->back()->with('error', 'Échec de l\'ouverture du fichier ZIP.');
            }
    
            // Supprimer le fichier ZIP téléchargé si vous le souhaitez
            // File::delete($zipPathFull);
        }
    
        $template->save();
    
        return redirect()->route('templateslist')->with('success', 'Template updated and extracted successfully');
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
