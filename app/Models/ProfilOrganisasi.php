<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'profil_organisasis';

    protected $fillable = [
        'gambar_struktur',
        'sumber',
        'lokasi',
        'embed_map',
        'keterangan',
        'email',
        'website',
    ];
}