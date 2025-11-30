<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\BukuTamuExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;



class BukuTamuController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin')->only(['index', 'edit','destroy','update']);
    // }

    public function index()
    {
        $data = BukuTamu::latest()->get();
        return view('bukutamu.index', compact('data'));
    }
    public function index_front()
    {
        // $data = BukuTamu::latest()->get();
        return view('bukutamu.index_front');
    }

    public function create()
    {
        return view('bukutamu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'nullable|string|max:100',
            'instansi' => 'nullable|string|max:100',
            'tujuan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'foto_data' => 'nullable|string' // tambahkan ini
        ]);
        
        // Jika upload manual (file input)
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_tamu', 'public');
        
        // Jika dari kamera (base64)
        } elseif ($request->filled('foto_data')) {
            $image = $request->foto_data;
        
            // Pisahkan data URI: "data:image/png;base64,xxxxxx"
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
        
            $fileName = 'foto_tamu/' . uniqid() . '.' . $image_type;
        
            // Simpan ke storage/app/public/foto_tamu/
            Storage::disk('public')->put($fileName, $image_base64);
        
            $validated['foto'] = $fileName;
        }
        
        // Simpan data ke database
        BukuTamu::create($validated);
        
        return redirect()->route('bukutamu.awal')->with('success', 'Data berhasil disimpan');
    }

    public function show(BukuTamu $bukutamu)
    {
        return view('bukutamu.show', compact('bukutamu'));
    }

    public function edit(BukuTamu $bukutamu)
    {
        return view('bukutamu.edit', compact('bukutamu'));
    }

    public function update(Request $request, BukuTamu $bukutamu)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'nullable|string',
            'instansi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'foto_data' => 'nullable'
        ]);

        // Jika ada foto kamera baru
        if ($request->foto_data) {

            $image = $request->foto_data;
        
            // Pisahkan data URI: "data:image/png;base64,xxxxxx"
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
        
            $fileName = 'foto_tamu/' . uniqid() . '.' . $image_type;
        
            // Simpan ke storage/app/public/foto_tamu/
            Storage::disk('public')->put($fileName, $image_base64);

            // Update foto
            $bukutamu->foto = $fileName;
        }

        $bukutamu->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'instansi' => $request->instansi,
            'tujuan' => $request->tujuan,
        ]);

        return redirect()->route('bukutamu.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy(BukuTamu $bukutamu)
    {
        if ($bukutamu->foto && Storage::disk('public')->exists($bukutamu->foto)) {
            Storage::disk('public')->delete($bukutamu->foto);
        }
        $bukutamu->delete();
        return redirect()->route('bukutamu.index')->with('success', 'Data berhasil dihapus');
    }

    
    public function export(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;
    
        return Excel::download(new BukuTamuExport($start, $end), 'buku_tamu.xlsx');
    }
    


    public function exportPdf(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = BukuTamu::query();

        if ($start && $end) {
            $query->whereBetween('created_at', [
                $start . ' 00:00:00',
                $end . ' 23:59:59'
            ]);
        }

        $data = $query->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->tanggal = $item->created_at ? $item->created_at->format('d-m-Y') : null;
                return $item;
            });


        $pdf = Pdf::loadView('bukutamu.export-pdf', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('buku_tamu.pdf');
    }

    public function search(Request $request)
    {
        $draw   = intval($request->input('draw'));
        $start  = intval($request->input('start', 0));
        $length = intval($request->input('length', 10));
        $keyword = $request->input('search.value');

        // ============= NEW FILTER TANGGAL =============
        $startDate = $request->start_date;
        $endDate   = $request->end_date;
        // ===============================================

        $query = BukuTamu::query();

        // Filter tanggal bila ada
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [
                $startDate . ' 00:00:00',
                $endDate . ' 23:59:59'
            ]);
        }

        // Filter search keyword
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                ->orWhere('no_hp', 'like', "%{$keyword}%")
                ->orWhere('jabatan', 'like', "%{$keyword}%")
                ->orWhere('instansi', 'like', "%{$keyword}%");
            });
        }

        // Hitung total filtered
        $totalFiltered = $query->count();

        // Data berdasarkan pagination
        $data = $query->orderBy('created_at', 'desc')
        ->skip($start)
        ->take($length)
        ->get()
        ->map(function ($item) {
            $item->tanggal = $item->created_at->format('d-m-Y');
            return $item;
        });
    

        // Total semua data (tanpa filter)
        $totalRecords = BukuTamu::count();
        

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFiltered,
            'data' => $data,
        ]);
    }

    public function instansi(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = BukuTamu::query();

        // Jika ada filter tanggal
        if ($start && $end) {
            $query->whereBetween('created_at', [
                $start . " 00:00:00",
                $end . " 23:59:59"
            ]);
        }

        $data = $query->select('instansi', DB::raw('COUNT(*) as total'))
            ->groupBy('instansi')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json([
            'labels' => $data->pluck('instansi'),
            'values' => $data->pluck('total'),
        ]);
    }


    public function jabatan(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = BukuTamu::query();

        if ($start && $end) {
            $query->whereBetween('created_at', [
                $start . " 00:00:00",
                $end . " 23:59:59"
            ]);
        }

        $data = $query->select('jabatan', DB::raw('COUNT(*) as total'))
            ->groupBy('jabatan')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json([
            'labels' => $data->pluck('jabatan'),
            'values' => $data->pluck('total'),
        ]);
    }


    public function harian(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = BukuTamu::query();

        if ($start && $end) {
            $query->whereBetween('created_at', [
                $start . " 00:00:00",
                $end . " 23:59:59"
            ]);
        }

        $data = $query->select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        return response()->json([
            'labels' => $data->pluck('tanggal'),
            'values' => $data->pluck('total'),
        ]);
    }

}