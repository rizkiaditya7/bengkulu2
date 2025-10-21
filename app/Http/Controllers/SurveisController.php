<?php

namespace App\Http\Controllers;

use App\Models\Surveis;
use App\Models\Jawabans;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Exports\SurveiExport;
use Maatwebsite\Excel\Facades\Excel;

class SurveisController extends Controller
{
    public function index()
    {
        $data = Surveis::with('jawabans.pertanyaan')->latest()->get();
       
            $pertanyaans = Pertanyaan::all();
            $surveis = Surveis::with('jawabans')->get();
        
            // Hitung Σ, N, NRR Unsur, NRR Tertimbang
            $summary = [];
            foreach ($pertanyaans as $p) {
                $nilai = Jawabans::where('pertanyaan_id', $p->id)->pluck('jawaban');
                $jumlah = $nilai->sum();
                $n = $nilai->count();
                $nrr_unsur = $n > 0 ? $jumlah / $n : 0;
                $nrr_tertimbang = $nrr_unsur * 0.11;
        
                $summary[] = [
                    'pertanyaan_id' => $p->id,
                    'jumlah' => $jumlah,
                    'n' => $n,
                    'nrr_unsur' => round($nrr_unsur, 2),
                    'nrr_tertimbang' => round($nrr_tertimbang, 3),
                ];
            }
            $totalResponden = Surveis::count();

            $hasil = [];
        
            foreach ($pertanyaans as $p) {
                $jumlah = Jawabans::where('pertanyaan_id', $p->id)->sum('jawaban');
                $n = Jawabans::where('pertanyaan_id', $p->id)->count();
                $nrr_unsur = $n > 0 ? $jumlah / $n : 0;
                $nrr_tertimbang = $nrr_unsur * 0.11;
        
                $hasil[] = [
                    'pertanyaan' => $p->judul,
                    'kode' => $p->kode,
                    'jumlah' => $jumlah,
                    'n' => $n,
                    'nrr_unsur' => round($nrr_unsur, 2),
                    'nrr_tertimbang' => round($nrr_tertimbang, 3),
                    'nilai'=>$nrr_unsur*25,
                ];
            }
            $total_nrr_tertimbang = collect($summary)->sum('nrr_tertimbang');

            // IKM setelah dikonversi = total_nrr_tertimbang * 25
            $ikm_konversi = $total_nrr_tertimbang * 25;

            // Mutu pelayanan berdasarkan nilai IKM
            if ($ikm_konversi >= 88.31) {
                $mutu = 'A';
                $kinerja = 'Sangat Baik';
            } elseif ($ikm_konversi >= 76.61) {
                $mutu = 'B';
                $kinerja = 'Baik';
            } elseif ($ikm_konversi >= 65) {
                $mutu = 'C';
                $kinerja = 'Kurang Baik';
            } else {
                $mutu = 'D';
                $kinerja = 'Tidak Baik';
            }

        return view('survei.index', compact('data','pertanyaans', 'surveis', 'summary','hasil', 'totalResponden','ikm_konversi', 'mutu', 'kinerja'));
    }

    public function create()
    {
        $pertanyaans = Pertanyaan::all();
        return view('survei.create', compact('pertanyaans'));
    }

    public function store(Request $request)
    {
        $survei = Surveis::create([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        foreach ($request->jawaban as $pertanyaan_id => $jawaban) {
            if (is_array($jawaban)) {
                $jawaban = implode(', ', $jawaban);
            }

            Jawabans::create([
                'survei_id' => $survei->id,
                'pertanyaan_id' => $pertanyaan_id,
                'jawaban' => $jawaban,
            ]);
        }

        return redirect()->route('survei.create')->with('success', 'Terima kasih! Survei berhasil disimpan.');
    }

    

    public function exportExcel()
    {
        $data = Surveis::with('jawabans.pertanyaan')->latest()->get();
       
        $pertanyaans = Pertanyaan::all();
        $surveis = Surveis::with('jawabans')->get();
    
        // Hitung Σ, N, NRR Unsur, NRR Tertimbang
        $summary = [];
        foreach ($pertanyaans as $p) {
            $nilai = Jawabans::where('pertanyaan_id', $p->id)->pluck('jawaban');
            $jumlah = $nilai->sum();
            $n = $nilai->count();
            $nrr_unsur = $n > 0 ? $jumlah / $n : 0;
            $nrr_tertimbang = $nrr_unsur * 0.11;
    
            $summary[] = [
                'pertanyaan_id' => $p->id,
                'jumlah' => $jumlah,
                'n' => $n,
                'nrr_unsur' => round($nrr_unsur, 2),
                'nrr_tertimbang' => round($nrr_tertimbang, 3),
            ];
        }
        $totalResponden = Surveis::count();

        $hasil = [];
    
        foreach ($pertanyaans as $p) {
            $jumlah = Jawabans::where('pertanyaan_id', $p->id)->sum('jawaban');
            $n = Jawabans::where('pertanyaan_id', $p->id)->count();
            $nrr_unsur = $n > 0 ? $jumlah / $n : 0;
            $nrr_tertimbang = $nrr_unsur * 0.11;
    
            $hasil[] = [
                'pertanyaan' => $p->judul,
                'kode' => $p->kode,
                'jumlah' => $jumlah,
                'n' => $n,
                'nrr_unsur' => round($nrr_unsur, 2),
                'nrr_tertimbang' => round($nrr_tertimbang, 3),
                'nilai'=>$nrr_unsur*25,
            ];
        }
        $total_nrr_tertimbang = collect($summary)->sum('nrr_tertimbang');

        // IKM setelah dikonversi = total_nrr_tertimbang * 25
        $ikm_konversi = $total_nrr_tertimbang * 25;

        // Mutu pelayanan berdasarkan nilai IKM
        if ($ikm_konversi >= 88.31) {
            $mutu = 'A';
            $kinerja = 'Sangat Baik';
        } elseif ($ikm_konversi >= 76.61) {
            $mutu = 'B';
            $kinerja = 'Baik';
        } elseif ($ikm_konversi >= 65) {
            $mutu = 'C';
            $kinerja = 'Kurang Baik';
        } else {
            $mutu = 'D';
            $kinerja = 'Tidak Baik';
        }

        return Excel::download(
            new SurveiExport($surveis, $pertanyaans, $summary, $hasil, $ikm_konversi, $mutu, $kinerja, $totalResponden),
            'hasil_survei.xlsx'
        );
    }

}