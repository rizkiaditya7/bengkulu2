<?php

namespace App\Exports;

use App\Models\BukuTamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuTamuExport implements FromCollection
{
    public function collection()
    {
        return BukuTamu::all()->map(function ($item) {
            return [
                'Nama' => $item->nama,
                'No. HP' => $item->no_hp,
                'Jabatan' => $item->jabatan,
                'Instansi' => $item->instansi,
                'Foto' => $item->foto ? asset('storage/' . $item->foto) : '-',
            ];
        });
    
    }

    public function headings(): array
    {
        return ['Nama', 'No. HP', 'Jabatan', 'Instansi', 'Foto'];
    }
}