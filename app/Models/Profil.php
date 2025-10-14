<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'logo',
        'email',
        'telp',
        'alamat',
        'deskripsi',
    ];
}