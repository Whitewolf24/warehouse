<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        // Fetch all products from the 'stock' table
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    // Show form add.blade.php
    public function showForm()
    {
        return view('product.add');
    }

    // Save a new product to the database
    public function saveProduct(Request $request)
    {

        $types = [
            'val1' => 'DVD',
            'val2' => 'Book',
            'val3' => 'Furniture',
        ];

        $productType = $types[$request->productType] ?? null;

        $rules = [
            'sku' => 'required|string|max:255|unique:stock',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'size' => $productType === 'DVD' ? 'required|numeric|min:0' : 'nullable',
            'weight' => $productType === 'Book' ? 'required|numeric|min:0' : 'nullable',
            'height' => $productType === 'Furniture' ? 'required|numeric|min:0' : 'nullable',
            'width' => $productType === 'Furniture' ? 'required|numeric|min:0' : 'nullable',
            'length' => $productType === 'Furniture' ? 'required|numeric|min:0' : 'nullable',
        ];
        $validated = $request->validate($rules);

        // append the $ symbol
        $price = $validated['price'] . ' $';

        // append the 'kg'
        $weight = $productType === 'Book' && isset($validated['weight'])
            ? $validated['weight'] . ' kg'
            : null;

        // Combine dimensions into a single field if the product is Furniture
        $dimensions = null;
        if ($productType === 'Furniture') {
            $dimensions = implode('x', [
                $validated['height'] ?? 0,
                $validated['width'] ?? 0,
                $validated['length'] ?? 0,
            ]);
        }

        // Create the product and store the data
        \App\Models\Product::create([
            'sku' => $validated['sku'],
            'name' => $validated['name'],
            'price' => $price,
            'size' => $productType === 'DVD' ? $validated['size'] : null,
            'weight' => $weight,
            'dimensions' => $productType === 'Furniture' ? $dimensions : null,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }


    public function massDelete(Request $request)
    {
        // Check if any IDs are selected for deletion
        if (empty($request->ids)) {
            return redirect()->route('product.index')->with('error', 'No products selected for deletion');
        }

        // Delete products by selected IDs from the 'stock' table
        Product::whereIn('id', $request->ids)->delete();

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Selected products deleted successfully');
    }
}
