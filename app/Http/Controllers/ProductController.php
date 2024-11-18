<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show product list (index page)
    public function index()
    {
        // Fetch all products from the 'stock' table
        $products = Product::all();
        return view('product.index', compact('products'));  // Pass products to the view
    }

    // Show form for adding product (add.blade.php)
    public function showForm()
    {
        return view('product.add');  // Return the add product page
    }

    // Save a new product to the database
    public function saveProduct(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'sku' => 'required|string|max:255|unique:stock', // Ensure uniqueness in the 'stock' table
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'size' => 'nullable|string|max:255',   // Size is only for DVD type, so it can be nullable
            'weight' => 'nullable|string|max:255', // Weight is only for Book type, so nullable
            'height' => 'nullable|string|max:255', // Height is for Furniture, so nullable
            'width' => 'nullable|string|max:255',  // Width is for Furniture, so nullable
            'length' => 'nullable|string|max:255', // Length is for Furniture, so nullable
        ]);

        // Process price, append the $ symbol
        $price = $validated['price'] . '$';

        // Process weight, append the 'kg' unit
        $weight = isset($validated['weight']) ? $validated['weight'] . ' kg' : null;

        // Process dimensions (height, width, length) and combine them with 'x'
        $dimensions = null;
        if (isset($validated['height']) && isset($validated['width']) && isset($validated['length'])) {
            $dimensions = $validated['height'] . 'x' . $validated['width'] . 'x' . $validated['length'];
        }

        // Create a new product in the 'stock' table
        $product = Product::create([
            'sku' => $validated['sku'],
            'name' => $validated['name'],
            'price' => $price,  // Price with the $ symbol
            'size' => $validated['size'] ?? null,  // Size is nullable
            'weight' => $weight,  // Weight with the 'kg' unit
            'height' => $dimensions ? explode('x', $dimensions)[0] : null,  // If dimensions exist, set height
            'width' => $dimensions ? explode('x', $dimensions)[1] : null,  // If dimensions exist, set width
            'length' => $dimensions ? explode('x', $dimensions)[2] : null,  // If dimensions exist, set length
        ]);

        // Redirect back to the product list page with success message
        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }

    // Handle mass delete action
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
