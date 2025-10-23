<?php
namespace App\Http\Controllers;

use App\Models\ProsesFasilitasi;
use Illuminate\Http\Request;

class ProsesFasilitasiController extends Controller
{
    public function index()
    {
        $data = ProsesFasilitasi::all();
        return view('proses_fasilitasi.index', compact('data'));
    }

    public function create()
    {
        return view('proses_fasilitasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahap' => 'required',
            'ikon' => 'nullable|string',
            'deskripsi' => 'required',
        ]);

        ProsesFasilitasi::create($request->all());
        return redirect()->route('proses_fasilitasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, ProsesFasilitasi $prosesFasilitasi)
    {
        $request->validate([
            'tahap' => 'required',
            'ikon' => 'nullable|string',
            'deskripsi' => 'required',
        ]);

        $prosesFasilitasi->update($request->all());
        return redirect()->route('proses_fasilitasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function show(ProsesFasilitasi $prosesFasilitasi)
    {
        return view('proses_fasilitasi.show', compact('prosesFasilitasi'));
    }

    public function edit(ProsesFasilitasi $prosesFasilitasi)
    {
        return view('proses_fasilitasi.edit', compact('prosesFasilitasi'));
    }

    

    public function destroy(ProsesFasilitasi $prosesFasilitasi)
    {
        $prosesFasilitasi->delete();
        return redirect()->route('admin.proses_fasilitasi.index')->with('success', 'Data berhasil dihapus.');
    }
}