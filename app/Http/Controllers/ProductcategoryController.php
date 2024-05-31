<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductcategoryController extends Controller
{
    //
    // create
    public function create(){
        return view('admin.Productcategory.addproductcategory');
    }
    public function store(Request $request){
        $request->validate([
            'name.*' => 'required|string|max:255',
        ]);
    
        $names = $request->input('name');
    
        foreach ($names as $name) {
            ProductCategory::create([
                'name' => $name,
            ]);
        }

        return redirect()->route('productcategorylist')->with('success', 'Template uploaded successfully');
    }

    public function list()
    {
        $productcategorys = ProductCategory::all();
        return view('admin.Productcategory.list',compact('productcategorys'));
    }

    public function edit($id)
    {
        $productcategory = Productcategory::findOrFail($id);
        return view('admin.Productcategory.update',compact('productcategory'));
    }

    public function update(Request $request,$id)
    {
        $productcategory = Productcategory::findOrFail($id);
        $request->validate([
            'name.*' => 'required|string|max:255',
        ]);
            $productcategory->update(['name' => $request->input('name')]);

        return redirect()->route('productcategorylist')->with('success', 'Template updated successfully');
    }
}
