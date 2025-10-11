<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surveis extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email'];

    public function jawabans()
    {
        return $this->hasMany(jawabans::class, 'survei_id');
    }
}