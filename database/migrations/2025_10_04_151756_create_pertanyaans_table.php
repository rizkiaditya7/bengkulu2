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
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique()->nullable(); // contoh: Q001
            $table->string('judul');                      // teks pertanyaan
            $table->enum('tipe', ['text', 'radio', 'checkbox', 'select', 'rating'])
                  ->default('text');                     // jenis pertanyaan
            $table->json('opsi')->nullable();            // untuk pilihan jawaban jika radio/checkbox/select
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaans');
    }
};