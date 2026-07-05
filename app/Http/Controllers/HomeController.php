<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        // Fetch 12 latest products for the recommendation grid
        $products = Product::with('store')->latest()->take(12)->get();
        
        return view('home', compact('reviews', 'products'));
    }
}
