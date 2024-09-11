<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductContoller extends Controller
{
    public function index()
    {
        $product = Product::all();

        return view('products.index', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $request->validated();

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status == 'on' ? true : false,
        ]);

        return redirect()->route('products.index');
    }


    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status  == 'on' ? 1 : 0,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete();

        return redirect()->route('products.index');
    }
}
