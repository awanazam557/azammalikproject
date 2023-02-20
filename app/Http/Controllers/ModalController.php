<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\Brand;
use App\Models\Item;
class ModalController extends Controller
{
    //


    public function index()
    {
        $modals = Modal::orderBy('id', 'asc')->paginate(4);
        return view('modals.index', compact('modals'));
    }
    


public function create()
{
    $brands = Brand::all();

    return view('modals.create', compact('brands'));
}

public function store(Request $request)
{
    
    $validatedData = $request->validate([
        'name' => 'required',
        'brand_id' => 'required|exists:brands,id',
    ]);
    $modal = new Modal();
    $modal->name = $validatedData['name'];
    $modal->brand_id = $validatedData['brand_id'];
    $modal->save();

    return redirect()->route('modals.index');
}
public function edit($id)
{
    $brands = Brand::all();
    $modal = Modal::find($id);
    return view('modals.edit', compact('modal' ,'brands'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'brand_id' => 'required|exists:brands,id'
    ]);

    $modal = Modal::find($id);
    $modal->name = $request->name;
    $modal->brand_id = $request->brand_id;
    $modal->save();

    return redirect('/modals')->with('message', 'modal updated succesfully');
}



public function destroy(Modal $modal)
{
    $modal->delete();
    return redirect('/modals')->with('message', 'modal deleted succesfully');

    // return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
}




}
