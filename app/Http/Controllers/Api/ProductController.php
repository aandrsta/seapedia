<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('store');

        if ($request->has('search') && !empty($request->search)) {
            $search = '%' . $request->search . '%';
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', $search)
                  ->orWhere('description', 'like', $search);
            });
        }

        $products = $query->latest()->get();

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('store')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
        }

        return response()->json($product);
    }
}
