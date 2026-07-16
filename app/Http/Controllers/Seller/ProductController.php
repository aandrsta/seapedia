<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $store    = \App\Models\Store::where('user_id', auth()->id())->first();
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

        // Handle image upload
        $imageUrl = null;
        if ($request->hasFile('product_image')) {
            $path     = $request->file('product_image')->store('products', 'public');
            $imageUrl = Storage::disk('public')->url($path);
        }

        $store->products()->create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image_url'   => $imageUrl,
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

        $imageUrl = $product->image_url;

        // Handle remove existing image
        if ($request->boolean('remove_image')) {
            $this->deleteImageFromStorage($product->image_url);
            $imageUrl = null;
        }

        // Handle new image upload (overrides existing)
        if ($request->hasFile('product_image')) {
            // Delete old image first
            $this->deleteImageFromStorage($product->image_url);
            $path     = $request->file('product_image')->store('products', 'public');
            $imageUrl = Storage::disk('public')->url($path);
        }

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image_url'   => $imageUrl,
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->ensureHasStore();
        $this->authorizeProductOwnership($product);

        // Delete image from storage before deleting product
        $this->deleteImageFromStorage($product->image_url);

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Delete a product image from local storage (if it's a local storage URL).
     * Skips deletion for external URLs (http/https not from this app).
     */
    protected function deleteImageFromStorage(?string $imageUrl): void
    {
        if (!$imageUrl) return;

        // Only delete if it's a local storage file (contains /storage/products/)
        if (str_contains($imageUrl, '/storage/products/')) {
            $path = str_replace('/storage/', '', parse_url($imageUrl, PHP_URL_PATH));
            Storage::disk('public')->delete($path);
        }
    }

    protected function authorizeProductOwnership(Product $product): void
    {
        $store = \App\Models\Store::where('user_id', auth()->id())->first();
        if ($product->store_id !== $store->id) {
            abort(403, 'Unauthorized action. Anda tidak memiliki akses ke produk ini.');
        }
    }
}
