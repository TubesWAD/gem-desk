<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Organization;
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
        $organizations = Organization::all();
        return view('productTypes.create', compact('organizations'));
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
            'organization_name' => 'required',
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
        $organizations = Organization::all();
        return view('productTypes.edit', compact('productTypes','organizations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'organization_name' => 'required',
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
        $productTypes = ProductType::findOrFail($id);
        $name = $productTypes->name;
        $products = Product::where('product_type', $name)->exists();
        
        if ($products) {
            return redirect()->route('productTypes.index')
                            ->with('success', 'You cannot delete this product type because there are still products using this type.');
        }

        $productTypes->delete();
        return redirect()->route('productTypes.index')
                        ->with('success', 'Product Type deleted successfully.');
    }}