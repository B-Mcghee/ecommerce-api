<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // GET /api/products
    public function index()
    {
        return response()->json(Product::all());
    }

    // POST /api/products
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer'
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    // GET /api/products/{id}
    public function show(Product $product)
    {
        return response()->json($product);
    }

    // PUT/PATCH /api/products/{id}
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'sometimes|required|numeric',
            'stock'       => 'sometimes|required|integer'
        ]);

        $product->update($data);
        return response()->json($product);
    }

    // DELETE /api/products/{id}
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
