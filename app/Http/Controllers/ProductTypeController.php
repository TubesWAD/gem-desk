<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    public function index()
    {
        $productTypes = ProductType::all();
        return view('productTypes.index', compact('productTypes'));
    }

    public function create()
    {
        return view('productTypes.create');
    }

    public function show($id)
    {
        $productTypes = ProductType::findOrFail($id);
        return view('productTypes.show', compact('productTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'asset_type' => 'required',
            'asset_category' => 'required',
            'description' => 'required',
        ]);

        ProductType::create($validatedData);

        return redirect()->route('productTypes.index')
                         ->with('success', 'Product Type created successfully.');
    }

    public function edit($id)
    {
        $productTypes = ProductType::findOrFail($id);
        return view('productTypes.edit', compact('productTypes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'asset_type' => 'required',
            'asset_category' => 'required',
            'description' => 'required',
        ]);

        ProductType::whereId($id)->update($validatedData);

        return redirect()->route('productTypes.index')
                         ->with('success', 'Product Type updated successfully.');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $productType = ProductType::findOrFail($id);
        $name = $productType->name;
        $products = Product::where('product_type', $name)->exists();
        
        if ($products) {
            return redirect()->route('productTypes.index')
                            ->with('success', 'You cannot delete this product type because there are still products using this type.');
        }

        $productType->delete();
        return redirect()->route('productTypes.index')
                        ->with('success', 'Product Type deleted successfully.');
    }}