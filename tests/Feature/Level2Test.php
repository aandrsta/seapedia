<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Level2Test extends TestCase
{
    use RefreshDatabase;

    protected $sellerUser;
    protected $otherSellerUser;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed initial data
        $this->seed();

        // Create standard seller
        $this->sellerUser = User::create([
            'name' => 'Seller Udin',
            'username' => 'sellerudin',
            'email' => 'udin@example.com',
            'password' => bcrypt('password'),
        ]);
        UserRole::create(['user_id' => $this->sellerUser->id, 'role' => 'seller']);

        // Create another seller
        $this->otherSellerUser = User::create([
            'name' => 'Seller Asep',
            'username' => 'sellerasep',
            'email' => 'asep@example.com',
            'password' => bcrypt('password'),
        ]);
        UserRole::create(['user_id' => $this->otherSellerUser->id, 'role' => 'seller']);
    }

    /** @test */
    public function seller_can_create_store_with_unique_name()
    {
        $this->actingAs($this->sellerUser);
        session(['active_role' => 'seller']);

        // Access store creation form
        $response = $this->get(route('seller.store.create'));
        $response->assertStatus(200);
        $response->assertSee('Pendaftaran Toko Baru');

        // Submit form
        $response = $this->post(route('seller.store.store'), [
            'name' => 'Toko Kelontong Udin',
            'description' => 'Menjual barang kelontong premium.',
        ]);

        $response->assertRedirect(route('dashboard.seller'));
        $this->assertDatabaseHas('stores', [
            'user_id' => $this->sellerUser->id,
            'name' => 'Toko Kelontong Udin',
            'description' => 'Menjual barang kelontong premium.',
        ]);

        // Attempting to create a second store fails
        $response = $this->post(route('seller.store.store'), [
            'name' => 'Toko Udin Cabang Dua',
        ]);
        $response->assertRedirect(route('dashboard.seller')); // Redirects without creating
        $this->assertDatabaseMissing('stores', ['name' => 'Toko Udin Cabang Dua']);

        // Other seller attempts to use the same name fails
        $this->actingAs($this->otherSellerUser);
        session(['active_role' => 'seller']);

        $response = $this->post(route('seller.store.store'), [
            'name' => 'Toko Kelontong Udin',
        ]);
        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function seller_can_edit_and_update_store()
    {
        // Setup store for Udin
        $store = Store::create([
            'user_id' => $this->sellerUser->id,
            'name' => 'Toko Kelontong Udin',
            'description' => 'Lama',
        ]);

        $this->actingAs($this->sellerUser);
        session(['active_role' => 'seller']);

        $response = $this->get(route('seller.store.edit'));
        $response->assertStatus(200);
        $response->assertSee('Perbarui Profil Toko');
        $response->assertSee('Toko Kelontong Udin');

        $response = $this->put(route('seller.store.update'), [
            'name' => 'Toko Kelontong Udin Baru',
            'description' => 'Baru',
        ]);

        $response->assertRedirect(route('dashboard.seller'));
        $this->assertDatabaseHas('stores', [
            'id' => $store->id,
            'name' => 'Toko Kelontong Udin Baru',
            'description' => 'Baru',
        ]);
    }

    /** @test */
    public function seller_product_management_crud()
    {
        // Create store for Udin
        $store = Store::create([
            'user_id' => $this->sellerUser->id,
            'name' => 'Toko Kelontong Udin',
        ]);

        $this->actingAs($this->sellerUser);
        session(['active_role' => 'seller']);

        // Index page lists products
        $response = $this->get(route('seller.products.index'));
        $response->assertStatus(200);
        $response->assertSee('Daftar Produk Jualan');

        // Create product form
        $response = $this->get(route('seller.products.create'));
        $response->assertStatus(200);

        // Store product
        $response = $this->post(route('seller.products.store'), [
            'name' => 'Beras Pandan Wangi 5kg',
            'price' => 75000,
            'stock' => 50,
            'description' => 'Beras wangi pulen asli cianjur.',
            'image_url' => 'https://example.com/beras.jpg',
        ]);

        $response->assertRedirect(route('seller.products.index'));
        $this->assertDatabaseHas('products', [
            'store_id' => $store->id,
            'name' => 'Beras Pandan Wangi 5kg',
            'price' => 75000,
            'stock' => 50,
        ]);

        $product = Product::where('name', 'Beras Pandan Wangi 5kg')->first();

        // Edit product form
        $response = $this->get(route('seller.products.edit', $product->id));
        $response->assertStatus(200);
        $response->assertSee('Beras Pandan Wangi 5kg');

        // Update product
        $response = $this->put(route('seller.products.update', $product->id), [
            'name' => 'Beras Pandan Wangi 5kg Super',
            'price' => 80000,
            'stock' => 45,
            'description' => 'Deskripsi baru.',
        ]);

        $response->assertRedirect(route('seller.products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Beras Pandan Wangi 5kg Super',
            'price' => 80000,
            'stock' => 45,
        ]);

        // Delete product
        $response = $this->delete(route('seller.products.destroy', $product->id));
        $response->assertRedirect(route('seller.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    /** @test */
    public function seller_cannot_modify_other_sellers_product()
    {
        // Setup store and product for Asep
        $asepStore = Store::create([
            'user_id' => $this->otherSellerUser->id,
            'name' => 'Toko Kelontong Asep',
        ]);
        $asepProduct = Product::create([
            'store_id' => $asepStore->id,
            'name' => 'Kopi Kapal Api',
            'price' => 3000,
            'stock' => 100,
        ]);

        // Setup store for Udin
        Store::create([
            'user_id' => $this->sellerUser->id,
            'name' => 'Toko Kelontong Udin',
        ]);

        // Udin login as seller
        $this->actingAs($this->sellerUser);
        session(['active_role' => 'seller']);

        // Udin tries to edit Asep's product -> 403
        $response = $this->get(route('seller.products.edit', $asepProduct->id));
        $response->assertStatus(403);

        // Udin tries to update Asep's product -> 403
        $response = $this->put(route('seller.products.update', $asepProduct->id), [
            'name' => 'Hack name',
            'price' => 5000,
            'stock' => 10,
        ]);
        $response->assertStatus(403);

        // Udin tries to delete Asep's product -> 403
        $response = $this->delete(route('seller.products.destroy', $asepProduct->id));
        $response->assertStatus(403);
    }

    /** @test */
    public function public_catalog_displays_real_data()
    {
        // Setup store and product
        $store = Store::create([
            'user_id' => $this->sellerUser->id,
            'name' => 'Toko Kelontong Udin',
        ]);
        $product = Product::create([
            'store_id' => $store->id,
            'name' => 'Minyak Goreng Bimoli 2L',
            'price' => 35000,
            'stock' => 20,
            'description' => 'Minyak kelapa sawit murni.',
        ]);

        // Guest views catalog index
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertSee('Minyak Goreng Bimoli 2L');
        $response->assertSee('Toko Kelontong Udin'); // store info is displayed

        // Guest views product detail
        $response = $this->get(route('products.show', $product->id));
        $response->assertStatus(200);
        $response->assertSee('Minyak Goreng Bimoli 2L');
        $response->assertSee('Toko Kelontong Udin');

        // Guest views store profile
        $response = $this->get(route('stores.show', $store->id));
        $response->assertStatus(200);
        $response->assertSee('Toko Kelontong Udin');
        $response->assertSee('Minyak Goreng Bimoli 2L');
    }

    /** @test */
    public function api_seller_endpoints()
    {
        // Setup store and product
        $store = Store::create([
            'user_id' => $this->sellerUser->id,
            'name' => 'Toko Kelontong Udin',
        ]);
        $product = Product::create([
            'store_id' => $store->id,
            'name' => 'Minyak Goreng Bimoli 2L',
            'price' => 35000,
            'stock' => 20,
        ]);

        $this->actingAs($this->sellerUser, 'sanctum');

        // 1. Get Seller Store
        $response = $this->withHeaders(['X-Active-Role' => 'seller'])
            ->getJson('/api/seller/store');
        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Toko Kelontong Udin']);

        // 2. Get Seller Products
        $response = $this->withHeaders(['X-Active-Role' => 'seller'])
            ->getJson('/api/seller/products');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['name' => 'Minyak Goreng Bimoli 2L']);

        // 3. Create Seller Product
        $response = $this->withHeaders(['X-Active-Role' => 'seller'])
            ->postJson('/api/seller/products', [
                'name' => 'Kecap Bango 550ml',
                'price' => 22000,
                'stock' => 30,
            ]);
        $response->assertStatus(210); // Check custom code status
        $this->assertDatabaseHas('products', ['name' => 'Kecap Bango 550ml']);
        
        $newProductId = $response->json('product.id');

        // 4. Update Seller Product
        $response = $this->withHeaders(['X-Active-Role' => 'seller'])
            ->putJson('/api/seller/products/' . $newProductId, [
                'name' => 'Kecap Bango 550ml Premium',
                'price' => 24000,
                'stock' => 25,
            ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('products', ['name' => 'Kecap Bango 550ml Premium']);

        // 5. Delete Seller Product
        $response = $this->withHeaders(['X-Active-Role' => 'seller'])
            ->deleteJson('/api/seller/products/' . $newProductId);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('products', ['id' => $newProductId]);
    }
}
