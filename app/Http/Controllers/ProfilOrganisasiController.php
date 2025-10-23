<?php
namespace App\Http\Controllers;

use App\Models\ProfilOrganisasi;
use Illuminate\Http\Request;

class ProfilOrganisasiController extends Controller
{
    public function index()
    {
        $data = ProfilOrganisasi::all();
        return view('profil_organisasi.index', compact('data'));
    }

    public function create()
    {
        return view('profil_organisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar_struktur' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sumber' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'embed_map' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_struktur')) {
            $file = $request->file('gambar_struktur');
            $path = $file->store('uploads/struktur', 'public');
            $data['gambar_struktur'] = $path;
        }

        ProfilOrganisasi::create($data);

        return redirect()->route('admin.organisasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(ProfilOrganisasi $profil_organisasi)
    {
        return view('profil_organisasi.edit', compact('profil_organisasi'));
    }

    public function update(Request $request, ProfilOrganisasi $profil_organisasi)
    {
        $request->validate([
            'gambar_struktur' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sumber' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'embed_map' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_struktur')) {
            $file = $request->file('gambar_struktur');
            $path = $file->store('uploads/struktur', 'public');
            $data['gambar_struktur'] = $path;
        }

        $profil_organisasi->update($data);

        return redirect()->route('admin.organisasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(ProfilOrganisasi $profil_organisasi)
    {
        $profil_organisasi->delete();
        return redirect()->route('admin.organisasi.index')->with('success', 'Data berhasil dihapus!');
    }
}