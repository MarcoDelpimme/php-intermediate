<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->description = $request->description;
        $newProduct->user_id = $request->user()->id;
        $newProduct->save();
        return redirect('/product')->with('operation_created', $newProduct);
    }

    public function details($id)
    {
        $products = Product::find($id);
        return view('details', ['products' => $products]);
    }



    public function delete($id, Request $request)
    {
        $delete = Product::find($id);

        $delete = Product::find($id);
        if ($request->user()->id !== $delete->user_id) {
            abort(401);
        }

        $delete->delete();
        return redirect('/product')->with('operation_success', $delete);
    }



    public function modify($id, Request $request)
    {
        $product = Product::find($id);
        if ($request->user()->id !== $product->user_id) {
            abort(401);
        }

        return view('modify', [
            'product' => Product::findOrFail($id),
        ]);
    }


    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        if ($request->user()->id !== $product->user_id) {
            abort(401);
        }
        $update = Product::find($id);
        $update->name = $request->name;
        $update->price = $request->price;
        $update->description = $request->description;
        $update->save();
        return redirect('/product')->with('operation_updated', $update);
    }
}
