<?php

namespace App\Http\Controllers;



use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\Brand;


class ItemController extends Controller
{
    public function index()
    {
       
        $items = Item::orderBy('date_added')->paginate(4);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $item = new Item();
        return view('items.create', compact('item'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'brand' => 'required',
        ]);

        $item = new Item();
        $item->name = $validatedData['name'];
        $item->amount = $validatedData['amount'];
        $item->brand = $validatedData['brand'];
        $item->model = $request->input('model');
        $item->date_added = now();
        $item->save();
        return redirect('')->with('message', 'item added succesfully');
    }

    public function edit($id)
    {
        $modals = Modal::all();
        $brands = Brand::all();
        $item = Item::find($id);
        return view('items.edit', compact('item', 'brands', 'modals')); 
    }

    // public function edit(Item $item)
    // {
    //     $brands = Brand::all();
    //     return view('items.edit', compact('item', 'brands'));
    // }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'brand' => 'required',
        ]);
        $item = Item::find($id);
        $item->name = $validatedData['name'];
        $item->amount = $validatedData['amount'];
        $item->brand = $validatedData['brand'];
        $item->model = $request->input('model');
        $item->save();
      

        return redirect('')->with('message', 'item updated  succesfully');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('')->with('message', 'item deleted succesfully');

        // return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
    }
}
