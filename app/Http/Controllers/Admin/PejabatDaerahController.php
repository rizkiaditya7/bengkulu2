<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PejabatDaerah;

class PejabatDaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PejabatDaerah::all();
        return view('admin.pejabat-daerah', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-pejabat-daerah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'anak' => 'nullable|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('foto')){
            $validated['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        PejabatDaerah::create($validated);
        return redirect()->route('admin.pejabat-daerah')->with('success','Data berhasil ditambahkan!');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PejabatDaerah::findOrFail($id);
        return view('admin.edit-pejabat-daerah', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_istri' => 'nullable|string|max:255',
            'anak' => 'nullable|string|max:255',
            'riwayat_jabatan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // jika ada foto
        ], [
            // Pesan error custom
            'nama.required' => 'Nama wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'foto.image' => 'File harus berupa gambar (jpg, jpeg, png).',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        $pejabatDaerah = PejabatDaerah::findOrFail($id);

        // Kalau ada upload foto
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pejabat-daerah', 'public');
            $pejabatDaerah->foto = $fotoPath;
        }

        $pejabatDaerah->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'nama_istri' => $request->nama_istri,
            'anak' => $request->anak,
            'riwayat_jabatan' => $request->riwayat_jabatan,
        ]);

        return redirect()->route('admin.pejabat-daerah')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $pejabat = PejabatDaerah::findOrFail($id);

    // Hapus foto jika ada
    if ($pejabat->foto && \Storage::disk('public')->exists($pejabat->foto)) {
        \Storage::disk('public')->delete($pejabat->foto);
    }

    $pejabat->delete();

    return redirect()->route('admin.pejabat-daerah')
        ->with('success', 'Data berhasil dihapus!');
}

}
