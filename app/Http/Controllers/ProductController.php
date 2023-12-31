<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Organization;
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
        $organizations = Organization::all();
        $productTypes = ProductType::all();
        return view('products.create', compact('productTypes','organizations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'organization_name' => 'required',
            'product_type' => 'required',
            'manufacturer' => 'required',
            'cost' => 'required',
            'description' => 'required',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function getProductTypesByOrganization(Request $request)
    {
        $organizations = $request->input('organization');
        $productTypes = ProductType::where('organization_name', $organizations)->get();
        return response()->json($productTypes);
    }


    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $productTypes = ProductType::all();
        $organizations = Organization::all();
        return view('products.edit', compact('products','productTypes','organizations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'organization_name' => 'required',
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
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}