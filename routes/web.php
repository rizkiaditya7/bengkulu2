<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KepalaDaerahController;
use App\Http\Controllers\Admin\PejabatDaerahController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BeritaUserController;
use App\Http\Controllers\User\AlbumUserController;
use App\Http\Controllers\User\KepalaDaerahUserController;
use App\Http\Controllers\User\KategoriUserController;
use App\Http\Controllers\User\ArtikelUserController;
use App\Http\Controllers\User\PenghargaanController;
use App\Http\Controllers\Admin\PenghargaanAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\User\BukuTamuController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\SurveisController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MediaSosialController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\HeroesController;

// ROUTE UNTUK TAMPILAN UMUM

Route::get('/kepala-daerah/bupati', [KepalaDaerahUserController::class, 'bupati'])
    ->name('user.bupati');
Route::get('/wakilbupati', [KepalaDaerahUserController::class, 'wakilBupati'])->name('user.wakil-bupati');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/beritauser', [BeritaUserController::class, 'index'])->name('user.berita');
Route::get('/detailberita/{id}', [BeritaUserController::class, 'show'])->name('berita.show');


Route::get('/artikel', [ArtikelUserController::class, 'index'])->name('user.artikel');
Route::get('/artikel/{artikel}', [ArtikelUserController::class, 'show'])->name('user.detail-artikel');

Route::get('/galeri', [AlbumUserController::class, 'albums'])->name('user.galeri');

//)
// Route::view('/pengumuman', 'user.pengumuman')->name('user.pengumuman');
Route::get('/detailalbum/{id}', [AlbumUserController::class, 'show'])->name('album.show');  


Route::get('/penghargaan', [PenghargaanController::class, 'index'])->name('user.penghargaan');

Route::get('/penghargaanadmin', [PenghargaanAdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan');

Route::get('/penghargaanadmin/create', [PenghargaanAdminController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-penghargaan');

Route::post('/penghargaanadmin', [PenghargaanAdminController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan-store');

Route::get('/penghargaanadmin/{id}/edit', [PenghargaanAdminController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-penghargaan');

Route::put('/penghargaanadmin/{id}', [PenghargaanAdminController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan-update');

Route::delete('/penghargaanadmin/{id}', [PenghargaanAdminController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan.destroy');


Route::view('/visimisi', 'user.visi-misi')->name('user.visi-misi');
Route::view('/gambaranumum', 'user.gambaran-umum')->name('user.gambaran-umum');
Route::view('/datastatistik', 'user.data-statistik')->name('user.data-statistik');

Route::get('/kategori/{kategori}', [KategoriUserController::class, 'show'])->name('user.kategori');



// ROUTE UNTUK ADMIN
Route::get('/dashboard', [DashboardAdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::get('/artikeladmin', [ArtikelController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel');

Route::get('/artikeladmin/create', [ArtikelController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-artikel');

Route::post('/artikeladmin', [ArtikelController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-store');

Route::get('/artikeladmin/{id}/edit', [ArtikelController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-artikel');

Route::put('/artikeladmin/{id}', [ArtikelController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-update');

Route::delete('/artikeladmin/{id}', [ArtikelController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-destroy');

// ROUTE UNTUK ADMIN GALERI

Route::get('/admin/galeri/{album}', [AlbumController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('admin.galeri');





// END ROUTE ADMIN GALERI

Route::get('/albumadmin', [AlbumController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.album');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // == ROUTE UNTUK MANAJEMEN ALBUM ==
    Route::get('/albums', [AlbumController::class, 'index'])->name('admin.album');
    Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');
    // Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('admin.galeri'); // Ini mengarah ke Kelola Foto
    Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');

    // == ROUTE UNTUK MANAJEMEN FOTO (di dalam album) ==
    Route::post('/photos', [PhotoController::class, 'store'])->name('photo.store');
    Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photo.update');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photo.destroy');
    Route::put('/photos/{photo}/set-cover', [PhotoController::class, 'setCover'])->name('photo.setcover');

});



// PEJABAT DAERAH ROUTES

Route::get('/pejabatdaerahadmin', [PejabatDaerahController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pejabat-daerah');

Route::get('/pejabatdaerahadmin/create', [PejabatDaerahController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-pejabat-daerah');

Route::post('/pejabatdaerahadmin', [PejabatDaerahController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pejabat-daerah-store');

Route::get('/pejabat-daerah/{id}/edit', [PejabatDaerahController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-pejabat-daerah');

Route::put('/pejabat-daerah/{id}', [PejabatDaerahController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update-pejabat-daerah');

Route::delete('/pejabat-daerah/{id}', [PejabatDaerahController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pejabat-daerah-destroy');



// KATEGORI BERITA ROUTES
Route::get('/beritaadmin', [BeritaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita');

Route::get('/beritaadmin/create', [BeritaController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-berita');

Route::post('/beritaadmin', [BeritaController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-berita-store');

Route::get('/beritaadmin/{id}/edit', [BeritaController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-berita');

Route::put('/beritaadmin/{id}', [BeritaController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update-berita');

Route::delete('/beritaadmin/{id}', [BeritaController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita-destroy');




// KEPALA DAERAH ROUTES

Route::get('/kepaladaerahadmin', [KepalaDaerahController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.kepala-daerah');

Route::get('/kepala-daerah/{id}/edit', [KepalaDaerahController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-kepala-daerah');

Route::put('/kepala-daerah/{id}', [KepalaDaerahController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update');

// route untuk buku tamu
// Route::resource('bukutamu', BukuTamuController::class)->names('bukutamu');
Route::resource('bukutamu', BukuTamuController::class)
    ->names('bukutamu')
    ->except(['index', 'edit','destroy','update']);
Route::get('/tamu', [BukuTamuController::class,'index_front'])->name('bukutamu.front');


// route pertanyaan
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('pertanyaan', PertanyaanController::class)
        ->names('admin.pertanyaan');
    Route::resource('profil', ProfilController::class)->names('admin.profil');
    Route::resource('media', MediaSosialController::class)->names('admin.media');
    Route::resource('layanan', LayananController::class)
        ->names('admin.layanan');
    Route::resource('heroes', HeroesController::class)->names('admin.heroes');
});
    Route::get('bukutamu', [BukuTamuController::class, 'index'])->middleware(['auth', 'verified'])->name('bukutamu.index');
    Route::get('bukutamu/{bukutamu}/edit', [BukuTamuController::class, 'edit'])->middleware(['auth', 'verified'])->name('bukutamu.edit');
    Route::put('bukutamu/{bukutamu}', [BukuTamuController::class, 'update'])->middleware(['auth', 'verified'])->name('bukutamu.update');
    Route::delete('bukutamu/{bukutamu}', [BukuTamuController::class, 'destroy'])->middleware(['auth', 'verified'])->name('bukutamu.destroy');


// survei
Route::prefix('survei')->group(function () {
    Route::get('/', [SurveisController::class, 'create'])->name('survei.create');
    Route::post('/', [SurveisController::class, 'store'])->name('survei.store');
    Route::get('/hasil', [SurveisController::class, 'index'])->middleware(['auth', 'verified'])->name('survei.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';