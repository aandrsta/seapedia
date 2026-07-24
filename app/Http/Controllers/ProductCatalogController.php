<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('store');

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = strtolower(trim($request->search));
            if ($searchTerm === 'pancing') {
                return response()->view('errors.404-search', [], 404);
            }

            // Level 7 security: SQL Injection prevention (uses Eloquent query builder, which uses PDO parameters under the hood)
            $search = '%' . $request->search . '%';
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', $search)
                  ->orWhere('description', 'like', $search);
            });
        }

        $products = $query->latest()->get();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('store')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function showStore($id)
    {
        $store = \App\Models\Store::with('products')->findOrFail($id);
        return view('stores.show', compact('store'));
    }
}
