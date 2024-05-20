<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function index()
    {

        $products = Product::all();
        $products = Product::paginate(5);


        return view('product', ['products' => $products]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $newProducts = new Product();
        $newProducts->name = $request->name;
        $newProducts->price = $request->price;
        $newProducts->description = $request->description;
        $newProducts->save();
        return redirect('/product');
    }

    public function details($id)
    {
        $products = Product::find($id);
        return view('details', ['products' => $products]);
    }



    public function delete($id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return redirect('/product');
    }



    public function modify($id)
    {
        return view('modify', ['id' => $id]);
    }


    public function update(Request $request, $id)
    {
        $update = Product::find($id);
        $update->name = $request->name;
        $update->price = $request->price;
        $update->description = $request->description;
        $update->save();
        return redirect('/product', ['id' => $id]);
    }
}
