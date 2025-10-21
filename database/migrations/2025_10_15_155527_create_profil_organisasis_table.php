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
        Schema::create('profil_organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_struktur')->nullable();
            $table->string('sumber')->nullable();
            $table->string('lokasi')->nullable();
            $table->text('embed_map')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_organisasis');
    }
};