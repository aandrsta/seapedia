<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Store;
use App\Models\Product;
use App\Models\Wallet;
use App\Models\DeliveryAddress;
use App\Models\Review;
use App\Models\Voucher;
use App\Models\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buyer Setup
        $buyer = User::updateOrCreate(
            ['username' => 'buyer'],
            [
                'name' => 'Buyer Seapedia',
                'email' => 'buyer@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );
        UserRole::updateOrCreate(['user_id' => $buyer->id, 'role' => 'buyer']);
        Wallet::updateOrCreate(['user_id' => $buyer->id], ['balance' => 500000.00]);
        DeliveryAddress::updateOrCreate(
            ['user_id' => $buyer->id, 'label' => 'Rumah'],
            [
                'address' => 'Jl. Segara No. 12, Jakarta Utara',
                'is_default' => true,
            ]
        );
        DeliveryAddress::updateOrCreate(
            ['user_id' => $buyer->id, 'label' => 'Kantor'],
            [
                'address' => 'Gedung Menara Biru Lt. 5, Sudirman, Jakarta Selatan',
                'is_default' => false,
            ]
        );

        // 2. Seller Setup
        $seller = User::updateOrCreate(
            ['username' => 'seller'],
            [
                'name' => 'Seller Toko Seapedia',
                'email' => 'seller@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );
        UserRole::updateOrCreate(['user_id' => $seller->id, 'role' => 'seller']);
        $store = Store::updateOrCreate(
            ['user_id' => $seller->id],
            [
                'name' => 'Toko Samudra',
                'description' => 'Menyediakan berbagai peralatan fotografi dan gadget premium berkualitas tinggi.',
            ]
        );

        // Seed products under store
        Product::updateOrCreate(
            ['store_id' => $store->id, 'name' => 'Kamera DSLR Professional'],
            [
                'description' => 'Kamera DSLR resolusi tinggi cocok untuk fotografer profesional dan pemula.',
                'price' => 250000.00, // Rp 250.000 for easier demo/testing
                'stock' => 10,
                'image_url' => null,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store->id, 'name' => 'Keyboard Mechanical RGB'],
            [
                'description' => 'Keyboard mekanikal switch biru dengan pencahayaan RGB dinamis.',
                'price' => 120000.00, // Rp 120.000
                'stock' => 25,
                'image_url' => null,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store->id, 'name' => 'Mouse Wireless Ergonomis'],
            [
                'description' => 'Mouse wireless presisi tinggi dengan baterai isi ulang dan desain nyaman.',
                'price' => 45000.00, // Rp 45.000
                'stock' => 40,
                'image_url' => null,
            ]
        );

        // 3. Driver Setup
        $driver = User::updateOrCreate(
            ['username' => 'driver'],
            [
                'name' => 'Driver Kurir Seapedia',
                'email' => 'driver@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );
        UserRole::updateOrCreate(['user_id' => $driver->id, 'role' => 'driver']);

        // 4. Multi Role Setup (owns buyer, seller, and driver roles)
        $multi = User::updateOrCreate(
            ['username' => 'multi'],
            [
                'name' => 'Multi Role User',
                'email' => 'multi@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );
        UserRole::updateOrCreate(['user_id' => $multi->id, 'role' => 'buyer']);
        UserRole::updateOrCreate(['user_id' => $multi->id, 'role' => 'seller']);
        UserRole::updateOrCreate(['user_id' => $multi->id, 'role' => 'driver']);
        Wallet::updateOrCreate(['user_id' => $multi->id], ['balance' => 300000.00]);
        DeliveryAddress::updateOrCreate(
            ['user_id' => $multi->id, 'label' => 'Apartemen'],
            [
                'address' => 'Apartemen Taman Sari Tower A No. 10B, Jakarta Barat',
                'is_default' => true,
            ]
        );
        $multiStore = Store::updateOrCreate(
            ['user_id' => $multi->id],
            [
                'name' => 'Toko Multi Nusantara',
                'description' => 'Toko serba ada yang menjual barang-barang unik nusantara.',
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $multiStore->id, 'name' => 'Kopi Arabika Gayo 250g'],
            [
                'description' => 'Biji kopi arabika Gayo pilihan dengan aroma dan rasa khas premium.',
                'price' => 75000.00, // Rp 75.000
                'stock' => 15,
                'image_url' => null,
            ]
        );

        // 5. Application Reviews (Level 1 Requirement)
        Review::updateOrCreate(
            ['reviewer_name' => 'Budi'],
            [
                'rating' => 5,
                'comment' => 'Aplikasi belanja paling mantap, navigasi gampang dan cepat!',
            ]
        );
        Review::updateOrCreate(
            ['reviewer_name' => 'Siti'],
            [
                'rating' => 4,
                'comment' => 'Desainnya keren dan modern sekali. Transaksinya mulus dan mudah digunakan.',
            ]
        );
        Review::updateOrCreate(
            ['reviewer_name' => 'Anto'],
            [
                'rating' => 3,
                'comment' => 'Tampilan sudah bagus, tapi tolong tambahkan lebih banyak opsi pengiriman di masa depan.',
            ]
        );

        // 6. Seed Vouchers
        Voucher::updateOrCreate(
            ['code' => 'SEAPEDIA10K'],
            [
                'discount_amount' => 10000.00,
                'remaining_usage' => 100,
                'valid_until' => '2027-12-31',
            ]
        );
        Voucher::updateOrCreate(
            ['code' => 'SEAPEDIAGEDE'],
            [
                'discount_amount' => 50000.00,
                'remaining_usage' => 5,
                'valid_until' => '2027-12-31',
            ]
        );
        Voucher::updateOrCreate(
            ['code' => 'VOUCHEREXPIRED'],
            [
                'discount_amount' => 20000.00,
                'remaining_usage' => 10,
                'valid_until' => '2020-01-01',
            ]
        );

        // 7. Seed Promos
        Promo::updateOrCreate(
            ['code' => 'PROMO5'],
            [
                'discount_percentage' => 5.00,
                'max_discount' => 25000.00,
                'valid_until' => '2027-12-31',
            ]
        );
        Promo::updateOrCreate(
            ['code' => 'PROMO10'],
            [
                'discount_percentage' => 10.00,
                'max_discount' => 50000.00,
                'valid_until' => '2027-12-31',
            ]
        );
        Promo::updateOrCreate(
            ['code' => 'PROMOEXPIRED'],
            [
                'discount_percentage' => 15.00,
                'max_discount' => 100000.00,
                'valid_until' => '2020-01-01',
            ]
        );
    }
}
