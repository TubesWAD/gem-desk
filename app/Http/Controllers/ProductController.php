<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $productTypes = ProductType::all();
        return view('products.create', compact('productTypes'));
    }

    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'product_type' => 'required',
            'manufacturer' => 'required',
            'cost' => 'required',
            'description' => 'required',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $productTypes = ProductType::all();
        return view('products.edit', compact('products','productTypes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'product_type' => 'required',
            'manufacturer' => 'required',
            'cost' => 'required',
            'description' => 'required',
        ]);

        Product::whereId($id)->update($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}