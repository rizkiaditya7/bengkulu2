<?php

namespace App\Exports;

use App\Models\BukuTamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuTamuExport implements FromCollection, WithHeadings
{
    protected $start;
    protected $end;

    public function __construct($start = null, $end = null)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    public function collection()
    {
        $query = BukuTamu::query();

        if ($this->start && $this->end) {
            $query->whereBetween('created_at', [
                $this->start . ' 00:00:00',
                $this->end . ' 23:59:59'
            ]);
        }
        
        return $query->get(['nama', 'no_hp', 'jabatan', 'instansi', 'tujuan', 'created_at'])
            ->map(function ($row) {
                $row->tanggal = $row->created_at
                    ? $row->created_at->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')
                    : null;
                return $row;
            });
        
    }

    public function headings(): array
    {
        return [
            'Nama',
            'No HP',
            'Jabatan',
            'Instansi',
            'Tujuan',
            'Tanggal'
        ];
    }
}