<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PertanyaanController extends Controller
{
    public function index()
    {
        $data = Pertanyaan::latest()->get();
        return view('admin.pertanyaan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pertanyaan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'nullable|string|max:10|unique:pertanyaans,kode',
            'judul' => 'required|string|max:255',
            'tipe' => 'required|string',
            'opsi' => 'nullable|string'
        ]);

        if ($validated['opsi']) {
            $validated['opsi'] = array_map('trim', explode(',', $validated['opsi']));
        }

        Pertanyaan::create($validated);

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Pertanyaan::findOrFail($id)->delete();
        return back()->with('success', 'Pertanyaan dihapus!');
    }
}