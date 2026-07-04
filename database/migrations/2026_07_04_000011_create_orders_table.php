<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->foreignId('voucher_id')->nullable()->constrained('vouchers')->onDelete('set null');
            $table->foreignId('promo_id')->nullable()->constrained('promos')->onDelete('set null');
            $table->enum('delivery_method', ['instant', 'next_day', 'regular']);
            $table->foreignId('delivery_address_id')->nullable()->constrained('delivery_addresses')->onDelete('set null');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('discount_amount', 15, 2)->default(0.00);
            $table->decimal('delivery_fee', 15, 2);
            $table->decimal('ppn_amount', 15, 2);
            $table->decimal('total', 15, 2);
            $table->enum('status', ['sedang_dikemas', 'menunggu_pengirim', 'sedang_dikirim', 'pesanan_selesai', 'dikembalikan'])->default('sedang_dikemas');
            $table->dateTime('deadline_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
