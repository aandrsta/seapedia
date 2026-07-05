<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected function ensureHasStore()
    {
        if (!auth()->user()->store()->exists()) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(
                redirect()->route('seller.store.create')->with('info', 'Buat profil toko terlebih dahulu.')
            );
        }
    }

    public function index()
    {
        $this->ensureHasStore();
        $store = \App\Models\Store::where('user_id', auth()->id())->first();
        $products = $store->products()->latest()->get();

        return view('dashboard.seller.products.index', compact('products'));
    }

    public function create()
    {
        $this->ensureHasStore();
        return view('dashboard.seller.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $this->ensureHasStore();
        $store = \App\Models\Store::where('user_id', auth()->id())->first();
        
        $store->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $request->image_url,
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $this->ensureHasStore();
        $this->authorizeProductOwnership($product);

        return view('dashboard.seller.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->ensureHasStore();
        $this->authorizeProductOwnership($product);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $request->image_url,
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->ensureHasStore();
        $this->authorizeProductOwnership($product);

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    protected function authorizeProductOwnership(Product $product)
    {
        $store = \App\Models\Store::where('user_id', auth()->id())->first();
        if ($product->store_id !== $store->id) {
            abort(403, 'Unauthorized action. Anda tidak memiliki akses ke produk ini.');
        }
    }
}
