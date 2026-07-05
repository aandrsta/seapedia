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
        
        // Fetch unique categories dynamically and map descriptions & images
        $categories = Product::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->get()
            ->map(function ($p) {
                $name = $p->category;
                $desc = '';
                $image = '';
                if ($name === 'Deep Sea Gear') {
                    $desc = 'Pancing profesional, sonar laut, jangkar, dan navigasi.';
                    $image = 'images/collections/deep-sea.png';
                } elseif ($name === 'Deck Wear') {
                    $desc = 'Tas dry bag marine, kacamata terpolarisasi, dan perlengkapan deck kapal.';
                    $image = 'images/collections/deck-wear.png';
                } elseif ($name === 'Eco Exploration') {
                    $desc = 'Baju selam neoprene, masker selam, kaki katak, dan eksplorasi bawah laut.';
                    $image = 'images/collections/eco-dive.png';
                } elseif ($name === 'Aqua Safety') {
                    $desc = 'Peralatan keselamatan maritim, jaket pelampung, dan survival gear.';
                    $image = 'images/collections/aqua-safety.png';
                } elseif ($name === 'Marine Electronics') {
                    $desc = 'Radar kapal, GPS marine navigator, senter waterproof, dan sonar laut.';
                    $image = 'images/collections/marine-electronics.png';
                } else { // Sailing Apparel
                    $desc = 'Jaket parka pelaut tahan angin, sepatu boat anti-slip, dan kaos jangkar.';
                    $image = 'images/collections/deck-wear.png';
                }
                return (object)[
                    'name' => $name,
                    'description' => $desc,
                    'image' => $image,
                ];
            });
            
        return view('home', compact('reviews', 'products', 'categories'));
    }
}
