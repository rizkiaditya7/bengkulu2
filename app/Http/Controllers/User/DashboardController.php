<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Album;

class DashboardController extends Controller
{
     public function index()
    {
        // Ambil 3 berita terbaru
        $beritas = Berita::with('kategori')
            ->latest()
            ->take(6)
            ->get();

        $albums = Album::with('cover', 'photos')
                    ->latest()     // urutkan berdasarkan created_at terbaru
                    ->take(3)      // ambil 3 album terbaru
                    ->get();

        // Ambil 3 album terbaru (contoh kalau mau tampilkan album)
        return view('dashboard', compact('beritas', 'albums'));
    }

}
