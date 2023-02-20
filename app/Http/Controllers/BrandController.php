<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Modal;


class BrandController extends Controller
{
    public function index()
    {
         
     
       
       
        $brands = Brand::orderBy('id')->paginate(4);
    

        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $item = new Brand();
        $item->name = $validatedData['name'];
        $item->save();
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $brand->update($request->only(['name']));

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {

        // $brand->items()->delete();
        // $brand->modals()->delete();
        $brand->delete();
        
       

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
