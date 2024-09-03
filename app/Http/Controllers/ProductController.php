<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $imageName = time() . '-' . $request->file('image')->extension();
        $request->image->move(public_path('products'), $imageName);
        $product = new products;
        // Set the new attributes from the request
        $product->image =$imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->with('success', 'Product created successfully!');;
    }
}