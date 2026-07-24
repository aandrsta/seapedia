<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        $product = $this->route('product');
        $user = auth()->user();

        // Enforce that user owns the store that owns the product
        return $user && $user->store && $product && $product->store_id === $user->store->id;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'product_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_image'  => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'price.min' => 'Harga produk tidak boleh negatif.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok produk harus berupa bilangan bulat.',
            'stock.min' => 'Stok produk tidak boleh negatif.',
            'product_image.image' => 'File harus berupa gambar.',
            'product_image.mimes' => 'Format gambar harus jpg, png, atau webp.',
            'product_image.max'   => 'Ukuran gambar tidak boleh melebihi 2MB.',
        ];
    }
}
