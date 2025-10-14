<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BukuTamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_hp',
        'jabatan',
        'instansi',
        'tujuan',
        'foto',
    ];
}