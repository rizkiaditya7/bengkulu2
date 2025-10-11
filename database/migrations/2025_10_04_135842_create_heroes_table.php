<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // contoh: Partner Terpercaya untuk Kebutuhan Plastik Anda
            $table->text('subtitle')->nullable(); // contoh: PT Sukses Plastik Nusantara memproduksi...
            $table->string('image')->nullable();  // contoh: path gambar produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};