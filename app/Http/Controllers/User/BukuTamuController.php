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
        
        return redirect()->route('bukutamu.index')->with('success', 'Data berhasil disimpan');
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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'nullable|string|max:100',
            'instansi' => 'nullable|string|max:100',
            'tujuan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($bukutamu->foto && Storage::disk('public')->exists($bukutamu->foto)) {
                Storage::disk('public')->delete($bukutamu->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_tamu', 'public');
        }

        $bukutamu->update($validated);
        return redirect()->route('bukutamu.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(BukuTamu $bukutamu)
    {
        if ($bukutamu->foto && Storage::disk('public')->exists($bukutamu->foto)) {
            Storage::disk('public')->delete($bukutamu->foto);
        }
        $bukutamu->delete();
        return redirect()->route('bukutamu.index')->with('success', 'Data berhasil dihapus');
    }

    
    public function export()
    {
        // dd("sampe sini");
        return Excel::download(new BukuTamuExport, 'buku_tamu.xlsx');
    }


    public function exportPdf()
    {
        $data = BukuTamu::all();

        $pdf = Pdf::loadView('bukutamu.export-pdf', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('buku_tamu.pdf');
    }
    public function search(Request $request)
{
    // Ambil parameter dari DataTables
        // echo($request->input('search.value'));die;
    $draw   = intval($request->input('draw'));
    $start  = intval($request->input('start', 0));
    $length = intval($request->input('length', 10));
    $search = $request->input('search.value'); 

    // Hitung total semua data
    $totalRecords = BukuTamu::count();

    // Query dasar
    $query = BukuTamu::query();

    // Kalau ada pencarian
    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('no_hp', 'like', "%{$search}%")
              ->orWhere('jabatan', 'like', "%{$search}%")
              ->orWhere('instansi', 'like', "%{$search}%");
        });
    }

    // Hitung total data yang difilter
    $totalFiltered = $query->count();

    // Ambil data sesuai pagination dari DataTables
    $data = $query->skip($start)
                  ->take($length)
                  ->orderBy('created_at', 'desc')
                  ->get();

    // Format respons sesuai DataTables
    return response()->json([
        'draw' => intval($draw),
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalFiltered,
        'data' => $data,
    ]);

    
}
 /**
     * Grafik jumlah tamu per instansi
     */
    public function instansi()
    {
        $data = BukuTamu::select('instansi', DB::raw('COUNT(*) as total'))
            ->groupBy('instansi')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json([
            'labels' => $data->pluck('instansi'),
            'values' => $data->pluck('total'),
        ]);
    }

    /**
     * Grafik jumlah tamu per jabatan
     */
    public function jabatan()
    {
        $data = BukuTamu::select('jabatan', DB::raw('COUNT(*) as total'))
            ->groupBy('jabatan')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json([
            'labels' => $data->pluck('jabatan'),
            'values' => $data->pluck('total'),
        ]);
    }

    /**
     * Grafik jumlah tamu per tanggal (dari kolom created_at)
     */
    public function harian()
    {
        $data = BukuTamu::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        return response()->json([
            'labels' => $data->pluck('tanggal'),
            'values' => $data->pluck('total'),
        ]);
    }

}