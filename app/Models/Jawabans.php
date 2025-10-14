<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawabans extends Model
{
    use HasFactory;

    protected $fillable = ['survei_id', 'pertanyaan_id', 'jawaban'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    public function survei()
    {
        return $this->belongsTo(Surveis::class, 'survei_id');
    }
}