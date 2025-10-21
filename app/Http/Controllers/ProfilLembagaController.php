<?php

namespace App\Http\Controllers;

use App\Models\ProfilLembaga;
use Illuminate\Http\Request;

class ProfilLembagaController extends Controller
{
    public function index()
    {
        $data = ProfilLembaga::latest()->get();
        return view('visi_misi.index', compact('data'));
    }

    public function create()
    {
        return view('visi_misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'selayang_pandang' => 'required',
            'tugas_fungsi' => 'required',
        ]);

        ProfilLembaga::create($request->all());
        return redirect()->route('admin.visi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(ProfilLembaga $visi)
    {
        return view('visi_misi.edit', compact('visi'));
    }

    public function update(Request $request, ProfilLembaga $visi)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'selayang_pandang' => 'required',
            'tugas_fungsi' => 'required',
        ]);

        $visi->update($request->all());
        return redirect()->route('admin.visi.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(ProfilLembaga $visi)
    {
        $visi->delete();
        return redirect()->route('admin.visi.index')->with('success', 'Data berhasil dihapus');
    }
}