<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';
    protected $fillable = ['nama', 'icon', 'warna', 'link'];
}