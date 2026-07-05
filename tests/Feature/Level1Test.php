<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Level1Test extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed initial data necessary for catalog
        $this->seed();
    }

    /** @test */
    public function landing_page_renders_seeded_reviews()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Suara Pengguna SEAPEDIA');
        $response->assertSee('Budi');
        $response->assertSee('Aplikasi belanja paling mantap');
    }

    /** @test */
    public function catalog_page_renders_products_and_stores()
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertSee('Katalog Produk');
        $response->assertSee('Kamera DSLR Professional');
        $response->assertSee('Toko Samudra'); // store info must be visible
    }

    /** @test */
    public function product_detail_page_is_accessible()
    {
        $product = Product::first();
        $response = $this->get(route('products.show', $product->id));

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->store->name);
    }

    /** @test */
    public function registration_creates_user_with_roles_and_wallet()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'roles' => ['buyer', 'seller'],
        ]);

        $response->assertRedirect(route('home'));
        
        $this->assertDatabaseHas('users', ['username' => 'johndoe', 'email' => 'john@example.com']);
        $user = User::where('username', 'johndoe')->first();
        
        $this->assertDatabaseHas('user_roles', ['user_id' => $user->id, 'role' => 'buyer']);
        $this->assertDatabaseHas('user_roles', ['user_id' => $user->id, 'role' => 'seller']);
        $this->assertDatabaseHas('wallets', ['user_id' => $user->id, 'balance' => 0.00]);
    }

    /** @test */
    public function login_authenticates_and_clears_active_role_session()
    {
        $user = User::where('username', 'buyer')->first();

        $response = $this->post('/login', [
            'login' => 'buyer',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
        $this->assertNull(session('active_role'));
    }

    /** @test */
    public function select_role_session_storage_and_redirection()
    {
        $user = User::where('username', 'multi')->first();
        $this->actingAs($user);

        // Access dashboard before selection redirects to select-role due to EnsureRoleSelected
        $response = $this->get(route('dashboard.buyer'));
        $response->assertRedirect(route('select-role'));

        // Post role selection
        $response = $this->post(route('select-role.store'), [
            'role' => 'buyer',
        ]);

        $response->assertRedirect(route('dashboard.buyer'));
        $this->assertEquals('buyer', session('active_role'));

        // Try to access driver dashboard while active role is buyer
        $response = $this->get(route('dashboard.driver'));
        $response->assertRedirect(route('select-role')); // blocks and redirects to select role
    }

    /** @test */
    public function review_submission_prevents_xss()
    {
        $response = $this->post(route('reviews.store'), [
            'reviewer_name' => 'Hacker <script>alert("XSS")</script>',
            'rating' => 5,
            'comment' => 'Great app! <script>window.location.href="evil.com"</script>',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('reviews', [
            'reviewer_name' => 'Hacker alert("XSS")',
            'comment' => 'Great app! window.location.href="evil.com"',
        ]);
    }

    /** @test */
    public function api_authentication_and_profile_retrieval()
    {
        // Test API Login
        $response = $this->postJson('/api/login', [
            'login' => 'buyer',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token', 'token_type', 'user' => ['id', 'name', 'username', 'email', 'roles']
        ]);

        $token = $response->json('access_token');

        // Test API Profile Retrieval
        $profileResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Active-Role' => 'buyer',
        ])->getJson('/api/profile');

        $profileResponse->assertStatus(200);
        $profileResponse->assertJsonFragment([
            'username' => 'buyer',
            'active_role' => 'buyer',
        ]);
    }
}
