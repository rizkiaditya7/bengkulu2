<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'judul',
        'tipe',
        'opsi',
    ];

    protected $casts = [
        'opsi' => 'array',
    ];
}