<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilLembaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'visi',
        'misi',
        'selayang_pandang',
        'tugas_fungsi',
    ];
}