<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    public function index()
    {
        $products = products::get();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time() . '-' . $request->file('image')->extension();
        $request->image->move(public_path('products'), $imageName);
        $product = new products;

        // Set the new attributes from the request
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        //dd($id);
        // $product = products::where('id',$id)->first();
        // return view('product.edit', ['product'=>$product]);

        $product = Products::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',

        ]);

        $product = Products::findOrFail($id);

        if (isset($request->image)) {
            $imageName = time() . '-' . $request->file('image')->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return back()->with('success', 'Product Updated successfully!');;
    }
}
