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
                'name' => 'Toko Samudra Dive',
                'description' => 'Pusat penyedia alat selam professional dan aksesoris diving premium.',
            ]
        );

        // Seed products under Toko Samudra Dive
        Product::updateOrCreate(
            ['store_id' => $store->id, 'name' => 'Baju Selam Neoprene 3mm'],
            [
                'description' => 'Wetsuit diving neoprene elastis tebal 3mm, memberikan kehangatan optimal di bawah air.',
                'price'       => 450000.00,
                'stock'       => 12,
                'category'    => 'Eco Exploration',
                'image_url'   => 'images/products/neoprene-wetsuit.png',
                'sold_count'  => 312,
                'rating'      => 4.8,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store->id, 'name' => 'Masker Selam Tempered Glass'],
            [
                'description' => 'Masker selam dengan lensa tempered glass anti-fogging dan seal silikon kedap air.',
                'price'       => 180000.00,
                'stock'       => 20,
                'category'    => 'Eco Exploration',
                'image_url'   => 'images/products/diving-mask.png',
                'sold_count'  => 540,
                'rating'      => 4.9,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store->id, 'name' => 'Sirip Selam Pro-Flow Fins'],
            [
                'description' => 'Diving fins (kaki katak) bersaluran aliran hidrodinamis untuk dorongan maksimal.',
                'price'       => 320000.00,
                'stock'       => 15,
                'category'    => 'Eco Exploration',
                'image_url'   => 'images/products/diving-fins.png',
                'sold_count'  => 198,
                'rating'      => 4.7,
            ]
        );

        // 2b. Seller 2 Setup (Bahari Fishing)
        $seller2 = User::updateOrCreate(
            ['username' => 'seller2'],
            [
                'name' => 'Seller Bahari Fishing',
                'email' => 'seller2@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );
        UserRole::updateOrCreate(['user_id' => $seller2->id, 'role' => 'seller']);
        $store2 = Store::updateOrCreate(
            ['user_id' => $seller2->id],
            [
                'name' => 'Bahari Fishing Shop',
                'description' => 'Penyedia joran pancing carbon, reel spinning, dan umpan pancing laut dalam.',
            ]
        );

        // Seed products under Bahari Fishing Shop
        Product::updateOrCreate(
            ['store_id' => $store2->id, 'name' => 'Joran Pancing Carbon 2.1m'],
            [
                'description' => 'Joran pancing casting serat karbon tebal 2.1 meter, ultra-ringan dan sangat tangguh.',
                'price'       => 350000.00,
                'stock'       => 10,
                'category'    => 'Deep Sea Gear',
                'image_url'   => 'images/products/fishing-rod.png',
                'sold_count'  => 87,
                'rating'      => 4.6,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store2->id, 'name' => 'Reel Pancing Spinning 12-BB'],
            [
                'description' => 'Reel pancing spinning dengan 12 bantalan bola antikarat, tarikan drag halus.',
                'price'       => 290000.00,
                'stock'       => 22,
                'category'    => 'Deep Sea Gear',
                'image_url'   => 'images/products/fishing-reel.png',
                'sold_count'  => 230,
                'rating'      => 4.7,
            ]
        );

        // 2c. Seller 3 Setup (Coral Guardian Store)
        $seller3 = User::updateOrCreate(
            ['username' => 'seller3'],
            [
                'name' => 'Seller Coral Guardian',
                'email' => 'seller3@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );
        UserRole::updateOrCreate(['user_id' => $seller3->id, 'role' => 'seller']);
        $store3 = Store::updateOrCreate(
            ['user_id' => $seller3->id],
            [
                'name' => 'Coral Guardian Store',
                'description' => 'Peralatan penyelamatan maritim, dry bag waterproof, dan senter bawah air.',
            ]
        );

        // Seed products under Coral Guardian Store
        Product::updateOrCreate(
            ['store_id' => $store3->id, 'name' => 'Pelampung Life Vest Premium'],
            [
                'description' => 'Life jacket/vest dengan daya apung tinggi bersertifikasi keselamatan pelayaran.',
                'price'       => 120000.00,
                'stock'       => 35,
                'category'    => 'Aqua Safety',
                'image_url'   => 'images/products/life-vest.png',
                'sold_count'  => 420,
                'rating'      => 4.9,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store3->id, 'name' => 'Senter Bawah Air Waterproof'],
            [
                'description' => 'Senter selam LED profesional berdaya tahan air hingga kedalaman 50 meter.',
                'price'       => 220000.00,
                'stock'       => 18,
                'category'    => 'Marine Electronics',
                'image_url'   => 'images/products/waterproof-flashlight.png',
                'sold_count'  => 155,
                'rating'      => 4.5,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $store3->id, 'name' => 'Tas Dry Bag Marine 20L'],
            [
                'description' => 'Tas punggung dry bag 100% kedap air kapasitas 20 liter untuk melindungi barang elektronik.',
                'price'       => 95000.00,
                'stock'       => 45,
                'category'    => 'Deck Wear',
                'image_url'   => 'images/products/dry-bag.png',
                'sold_count'  => 680,
                'rating'      => 4.8,
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
                'name' => 'Toko Maritim Nusantara',
                'description' => 'Toko pakaian dan gaya hidup kru maritim bertema kelautan nusantara.',
            ]
        );

        // Seed products under Toko Maritim Nusantara
        Product::updateOrCreate(
            ['store_id' => $multiStore->id, 'name' => 'Jaket Parka Navigator Waterproof'],
            [
                'description' => 'Jaket parka khusus laut anti-air dan penahan angin kencang dengan lapisan polar hangat.',
                'price'       => 550000.00,
                'stock'       => 15,
                'category'    => 'Sailing Apparel',
                'image_url'   => 'images/products/parka-jacket.png',
                'sold_count'  => 143,
                'rating'      => 4.8,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $multiStore->id, 'name' => 'Kacamata Polarized Pelaut'],
            [
                'description' => 'Kacamata hitam terpolarisasi UV400 untuk mengurangi silau pantulan air laut.',
                'price'       => 150000.00,
                'stock'       => 30,
                'category'    => 'Deck Wear',
                'image_url'   => 'images/products/polarized-sunglasses.png',
                'sold_count'  => 390,
                'rating'      => 4.6,
            ]
        );
        Product::updateOrCreate(
            ['store_id' => $multiStore->id, 'name' => 'Kaos Maritim Anchor Crew'],
            [
                'description' => 'Kaos katun bambu 30s premium bermotif jangkar laut, sangat adem dan nyaman digunakan.',
                'price'       => 95000.00,
                'stock'       => 50,
                'category'    => 'Sailing Apparel',
                'image_url'   => 'images/products/anchor-tshirt.png',
                'sold_count'  => 1240,
                'rating'      => 4.9,
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
