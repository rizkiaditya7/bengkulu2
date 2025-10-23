<?php

namespace App\Providers;

use App\Models\heroes;
use App\Models\layanan;
use App\Models\media_sosial;
use Illuminate\Support\ServiceProvider;
use App\Models\Profil;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Ambil data profil (misalnya hanya 1 record)
        $profil = Profil::first();
        $media = media_sosial::all();
        $layanan = layanan::all();
        $heroes = heroes::all();
    
        $nama = $profil->nama ?? 'Nama Perusahaan';
        $parts = explode(' ', $nama, 2);
    
        $bagian1 = $parts[0] ?? '';
        $bagian2 = $parts[1] ?? '';
    
        // Tambahkan bagian1 dan bagian2 ke dalam objek profil
        if (!$profil) {
            $profil = new \stdClass();
        }
        
        $profil->bagian1 = $bagian1;
        $profil->bagian2 = $bagian2;
    
        // Bagikan ke semua view
        View::share([
            'profil' => $profil,
            'media' => $media,
            'layanan' => $layanan,
            'heroes' => $heroes,
        ]);
    }
}