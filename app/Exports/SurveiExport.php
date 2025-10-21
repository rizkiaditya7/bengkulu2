<?php

namespace App\Exports;

// use App\Models\Surveis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SurveiExport implements FromView
{
    protected $surveis, $pertanyaans, $summary, $hasil, $ikm_konversi, $mutu, $kinerja, $totalResponden;

    public function __construct($surveis, $pertanyaans, $summary, $hasil, $ikm_konversi, $mutu, $kinerja, $totalResponden)
    {
        $this->surveis = $surveis;
        $this->pertanyaans = $pertanyaans;
        $this->summary = $summary;
        $this->hasil = $hasil;
        $this->ikm_konversi = $ikm_konversi;
        $this->mutu = $mutu;
        $this->kinerja = $kinerja;
        $this->totalResponden = $totalResponden;
    }

    public function view(): View
    {
        return view('exports.hasil_survei', [
            'surveis' => $this->surveis,
            'pertanyaans' => $this->pertanyaans,
            'summary' => $this->summary,
            'hasil' => $this->hasil,
            'ikm_konversi' => $this->ikm_konversi,
            'mutu' => $this->mutu,
            'kinerja' => $this->kinerja,
            'totalResponden' => $this->totalResponden,
        ]);
    }
}